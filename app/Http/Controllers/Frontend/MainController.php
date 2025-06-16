<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('frontend.categories',  compact('categories'));
    }
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();
        return view('frontend.products', compact('category', 'products'));
    }
    public function singleProduct($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('frontend.single-product', compact('product'));
    }
}
