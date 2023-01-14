<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->search && $request->category) {
            $books = Book::where('title', 'LIKE', '%' . $request->search . '%')
                ->whereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category);
                })->get();
            return view('bookList', compact('books', 'categories'));
        }
        if ($request->search || $request->category) {
            $books = Book::where('title', 'LIKE', '%' . $request->search . '%')
                ->orwhereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category);
                })->get();
            return view('bookList', compact('books', 'categories'));
        }
        $books = Book::with('categories')->get();
        return view('bookList', compact('books', 'categories'));
    }
}
