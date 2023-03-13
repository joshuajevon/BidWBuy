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

    public function auctionPage(){
        return view('main.auction');
    }

    public function buyNowPage(){
        $products = Product::all();
        return view('main.buynow', compact('products'));
    }

    public function productById($id){
        $product = Product::findOrFail($id);
        return view('main.productById', compact('product'));
    }

    // cart

    public function cart(){
        return view('user.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }


    // admin product / buynow

    public function adminProductDashboard(){
        $products = Product::all();
        return view('admin.buynow.dashboard', compact('products'));
    }

    public function createProduct(){
        $categories = Category::all();
        return view('admin.buynow.createProduct', compact('categories'));
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
        return view('admin.buynow.editProduct', compact('product'));
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

    // admin auction
    public function adminAuctionDashboard(){
        return view('admin.auction.dashboard');
    }
}
