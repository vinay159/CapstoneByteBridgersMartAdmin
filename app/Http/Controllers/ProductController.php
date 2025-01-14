<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    const UPLOAD_PATH = 'storage/products/images';

    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->input('q'), function ($query, $q) {
                $query->where('product_name', 'like', '%' . $q . '%');
            })
            ->latest()
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = CategoryController::getCategoryLists();

        return view('products.create', [
            'product' => optional(),
            'categories' => $categories,
            'is_edit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'sku' => 'required|unique:products,sku',
            'category_id' => 'required|exists:categories,id,status,1',
            'price' => 'required|numeric',
            'discount' => 'sometimes|min:0|max:100',
            'image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        $image->move(public_path(self::UPLOAD_PATH), $image_name);

        $validate['image'] = self::UPLOAD_PATH . '/' . $image_name;
        $validate['slug'] = Str::slug($validate['product_name']);
        $validate['discount'] = $request->input('discount', 0);

        Product::create($validate);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $product->load('reviews.user');

        $reviews = ProductReview::query()
            ->where('product_id', $id)
//            ->where('status', 1)
            ->latest()
            ->paginate(10);

        return view('products.reviews',[
            'product' => $product,
            'reviews' => $reviews,
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = CategoryController::getCategoryLists();

        return view('products.create', [
            'product' => $product,
            'categories' => $categories,
            'is_edit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validate = $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'category_id' => 'required|exists:categories,id,status,1',
            'price' => 'required|numeric',
            'discount' => 'sometimes|min:0|max:100',
            'image' => 'nullable|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->extension();
            $image->move(public_path(self::UPLOAD_PATH), $image_name);

            $validate['image'] = self::UPLOAD_PATH . '/' . $image_name;
        }

        $validate['slug'] = Str::slug($validate['product_name']);
        $validate['discount'] = $request->input('discount', 0);

        $product->update($validate);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->status = $product->status == 1 ? 0 : 1;

        $product->save();

        return redirect()->back()->with('success', 'Product status updated successfully.');
    }
}
