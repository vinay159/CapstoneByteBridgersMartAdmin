<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cache;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::query()
            ->when($request->input('q'), function ($query, $q) {
                $query->where('name', 'like', '%' . $q . '%');
            })
            ->latest()
            ->paginate();

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
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($request->only(['name']));

        self::clearCategoryLists();

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
        $this->validate($request, [
            'name' => "required|unique:categories,name,{$id}",
        ]);

        $category = Category::findOrFail($id);

        $category->update($request->only(['name']));

        self::clearCategoryLists();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->status = $category->status == 1 ? 0 : 1;

        $category->save();

        self::clearCategoryLists();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public static function getCategoryLists()
    {
        return Cache::rememberForever('category_lists', function () {
            return Category::where('status', 1)->pluck('name', 'id');
        });
    }

    public static function clearCategoryLists()
    {
        Cache::forget('category_lists');
    }
}
