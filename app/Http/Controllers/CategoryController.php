<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category', compact('categories'));
    }

    public function add()
    {
        return view('addCategory');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        $category = Category::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success added');
        return redirect('/categories');
    }

    public function edit(Category $slug)
    {

        $category = $slug;
        return view('editCategory', compact('category'));
    }

    public function update(Request $request, Category $slug)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $slug->slug = null;
        $slug->update($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success updated');
        return redirect('/categories');
    }

    public function delete(Category $slug){
        $slug->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success deleted');

        return redirect('/categories');
    } 

    public function listDeletedCategory(){
        $categories = Category::onlyTrashed()->get();
        return view('listDeletedCategory', compact('categories'));
    }

    public function restore($slug){
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();

        Session::flash('status', 'success');
        Session::flash('message', 'Data has been success restored');

        return redirect('/categories/deleted');

    }
}
