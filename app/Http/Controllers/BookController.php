<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::all();
        return view('book', compact('books'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('addBook', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'book_code' => 'required|unique:books,book_code|max:255',
            'title' => 'required|max:255',
        ]);

        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName =  now()->timestamp . '--' . $request->title  . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success added');
        $book = Book::create($request->all('title', 'book_code', 'cover'));

        $book->categories()->sync($request->categories);


        return redirect('/books');
    }

    public function edit(Book $slug)
    {
        $book = $slug;
        $categories = Category::all();
        return view('editBook', compact('book', 'categories'));
    }

    public function update(Request $request, Book $slug)
    {
        $request->validate([
            'title' => 'required|max:100',
        ]);

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName =  now()->timestamp . '--' . $request->title  . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);

            Storage::delete('cover/' . $slug->cover);

            $request['cover'] = $newName;
        } else {
            $request['cover'] = $slug->cover;
        }


        if ($request->categories) {
            $slug->categories()->sync($request->categories);
        }

        $slug->update($request->all('title', 'book_code', 'cover', 'slug'));

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success updated');
        return redirect('/books');
    }

    public function delete(Book $slug)
    {
        $slug->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success deleted');
        return redirect('/books');
    }

    public function listDeletedBooks(){
        $books = Book::onlyTrashed()->get();
        return view('listDeletedBook', compact('books'));
    }

    public function restore($slug){
        $books =Book::withTrashed()->where('slug', $slug)->first();
        $books->restore();

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success restored');

        return redirect('/books/deleted');

    }
}
