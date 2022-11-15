<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products() {
        $all_products = Product::all();
        return view('catalog', ['all_products' => $all_products]);
    }
}
