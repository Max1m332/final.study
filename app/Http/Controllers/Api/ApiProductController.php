<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    public function list() {
        return Product::all();
    }

    public function add(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'title' => 'required|max:30|min:5',
            'price' => 'required|numeric|max:999999',
            'quantity' => 'required|numeric'
       ]);

       if($validator->fails()) {
            return [
                'status' => 'error',
                'description' => $validator->errors()
            ];
       }
       Product::create([
        'title' => $request->title,
        'price' => $request->price,
        'quantity' => $request->quantity
       ]); 
       
       $result = [
        'status' => "Success"
       ];
       
       return $this->sendResponse($result);
    }

    public function update($id, Request $request) {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:30|min:5',
            'price' => 'required|numeric|max:999999',
            'quantity' => 'required|numeric'
       ]);

       if($validator->fails()) {
        return [
            'status' => 'error',
            'description' => $validator->errors()
        ];
        }    
        
        Product::find($id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        $result = [
            'status' => "success"
        ];

        return $this->sendResponse($result);
    }

    public function delete($id) {

        Product::find($id)->first()->delete();

        $result = [
            'status' => "success"
        ];

        return $this->sendResponse($result);

    }
}
