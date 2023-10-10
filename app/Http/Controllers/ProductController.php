<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    const CURRENCY_LIST = ['USD', 'CAD', 'GBP', 'EUR'];

    const UPLOAD_PATH = 'storage/products/images';

    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create', ['currencies' => self::CURRENCY_LIST]);
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'sku' => 'required|unique:products,sku',
            'currency' => 'required|in:USD,CAD,GBP,EUR',
            'price' => 'required|numeric',
            'image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        $image->move(public_path(self::UPLOAD_PATH), $image_name);

        $validate['image'] = self::UPLOAD_PATH . '/' . $image_name;
        $validate['slug'] = Str::slug($validate['product_name']);

        Product::create($validate);

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
