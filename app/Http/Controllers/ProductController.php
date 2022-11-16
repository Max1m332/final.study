<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list() {
        $all_products = Product::all();
        return view('catalog.list', ['all_products' => $all_products]);
    }

    public function new() {
        return view('catalog.new');
    }

    public function add(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:30|min:5',
            'price' => 'required|numeric|max:6',
            'quantity' => 'required|numeric'
            ]);

        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect('/catalog');
    }
}
