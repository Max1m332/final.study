<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

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

    public function edit($id) {
        $item = Product::find($id);
        return view('catalog.edit', ['item' => $item]);
    }

    public function update(Request $request) {
        $request->validate([
            'title' => 'required|max:30|min:5',
            'price' => 'required|numeric|max:999999',
            'quantity' => 'required|numeric'
            ]);

            Product::find($request->id)->update([
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity
            ]);
            return redirect('/catalog');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/catalog');
    }
}