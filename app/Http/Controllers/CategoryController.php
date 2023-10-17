<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate();

        return view('category.index', [
            'category' => $category,
        ]);
    }

    public function create()
    {
        return view('category.create', [
            'category' => optional(),
            'is_edit' => false,
        ]);
    }

    public function store(Request $request)
    {
        Category::create($request->only(['name']));

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.create', [
            'category' => $category,
            'is_edit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->only(['name']));

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->status = $category->status == 1 ? 0 : 1;

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }
}
