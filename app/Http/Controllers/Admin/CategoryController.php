<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;


        $categories = Category::when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%$search%");
        })->paginate(5);


        return view('admin.categories.index', compact('categories', 'search'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);


        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori ditambahkan');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);


        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Kategori diperbarui');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori dihapus');
    }
}
