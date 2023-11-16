<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $categories = Category::get();
        $newProducts = Product::take(3)->get();
        return view('Enduser.index', compact('categories', 'newProducts'));
    }
    public function shop() {
        $products = Product::get();
        $categories = Category::get();
        return view('Enduser.shop', compact('categories', 'products'));
    }
    public function single($id) {
        $categories = Category::get();
        $product = Product::find($id);
        return view('Enduser.single', compact('categories', 'product'));
    }
}
