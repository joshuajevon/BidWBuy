<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function welcome(){
        $products = Product::latest()->take(3)->get();
        return view('main.welcome', compact('products'));
    }

    public function createProduct(){
        $categories = Category::all();
        return view('admin.createProduct', compact('categories'));
    }

    public function storeProduct(Request $request){

        // $request->validate([
        //     'Name' => 'required|unique:books,Name,except,id',
        //     'PublicationDate' => 'required',
        //     'Stock' => 'required|integer|gt:5',
        //     'Author' => 'required|min:5',
        //     'Image' => 'required|mimes:png,jpg'
        // ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->name.$extension;
        $request->file('image')->storeAs('/public/image', $fileName);

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $fileName,
            'category_id' => $request->CategoryName,
        ]);

        //name dari model => $request->name dari form

        return redirect('/');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.editProduct', compact('product'));
    }

    public function update(Request $request, $id){

        // $request->validate([
        //     'Name' => 'required',
        //     'PublicationDate' => 'required',
        //     'Stock' => 'required|integer|gt:5',
        //     'Author' => 'required|min:5',
        //     'Image' => 'required|mimes:png,jpg'
        // ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->name.$extension;
        $request->file('image')->storeAs('/public/image', $fileName);

        Product::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $fileName,
        ]);
        return redirect('/');
    }

    public function delete($id){
        Product::destroy($id);
        return redirect('/');
    }
}
