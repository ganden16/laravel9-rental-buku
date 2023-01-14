<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', 'active')->get();
        $books = Book::all();
        return view('bookRent', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
        ], [
            'user_id.required' => 'Tolong diisi form user',
            'book_id.required' => 'Tolong diisi form book',
        ]);
        $request['rent_date'] = now()->toDateString();
        $request['return_date'] = now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'instock') {
            Session::flash('status', 'false');
            Session::flash('message', 'Cannot rent, the book is not available');

            return redirect('/rents');
        } else {
            $countRentLog = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($countRentLog >= 3) {
                Session::flash('status', 'false');
                Session::flash('message', 'Cannot rent, User has reach limit of book, max 3 ');
                return redirect('/rents');
            }
            try {
                DB::beginTransaction();

                RentLogs::create($request->all());

                $book = Book::findOrFail($request->book_id);
                $book->status = 'not available';
                $book->save();
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                Session::flash('status', 'false');
                Session::flash('message', 'sorry, server error!');
                return redirect('rents');
            }
            Session::flash('status', 'true');
            Session::flash('message', 'book has been success rented');
            return redirect('rents');
        }
    }

    public function indexReturn()
    {
        $users = User::where('id', '!=', 1)->where('status', 'active')->get();
        $books = Book::all();
        return view('returnBook', compact('users', 'books'));
    }

    public function storeReturn(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null)->first();

        if ($rent) {
            $rent['actual_return_date'] = now()->toDateString();
            $rent->save();

            Session::flash('status', 'true');
            Session::flash('message', 'book has been success returned');

            return redirect('/rents/return');
        }

        Session::flash('status', 'false');
        Session::flash('message', 'User does not rent');
        return redirect('/rents/return');
    }
}
