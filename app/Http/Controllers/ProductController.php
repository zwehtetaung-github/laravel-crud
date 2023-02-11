<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('product.index', [
            'products' => $product
        ] );
    }

    public function add(){
        return view('product.add');
    }

    public function create(){
        $validator = validator(request()->all(), [
            "title" => "required|unique:Products",
            "short_notes" => "required",
            "price" => "required",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator); //$errors
        }

        $product = new Product();
        $product->title = request()->title;
        $product->short_notes = request()->short_notes;
        $product->price = request()->price;
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect('/product')->with('info', 'A product created!');
    }

    public function edit($id){
        $product = Product::find($id);

        if(Gate::allows('product-edit', $product)){
            return view('product.edit', [
                'product' => $product
            ]);
        } else {
            return back()->with('error', 'Unauthorize to edit this record !');
        }

    }


    public function update($id){
        $validator = validator(request()->all(), [
            "title" => "required|unique:Products",
            "short_notes" => "required",
            "price" => "required",
        ]);

        if($validator->fails()){
            return back()->withErrors($validator); //$errors
        }

        $product = Product::find($id);
        $product->title = request()->title;
        $product->short_notes = request()->short_notes;
        $product->price = request()->price;
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect("/product/edit/$product->id")->with('info', 'A product edited !');
    }

    public function delete($id){
        $product = Product::find($id);
        if(Gate::allows('product-delete', $product)){
            $product->delete();
            return back()->with('info', 'A record of Product deleted!');
        } else {
            return back()->with('error', 'Unauthorize to delete this record !');
        }

    }
}
