<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Auction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function welcome(){
        $products = Product::latest()->take(3)->get();
        $auctions = Auction::latest()->take(3)->get();
        return view('main.welcome', compact('products','auctions'));
    }

    public function auctionPage(Request $request){
        if($request->input('search')){
            $auctions = Auction::where('name','like','%' .request('search'). '%')->simplePaginate(6);
        } else{
            $auctions = Auction::orderBy('created_at', 'desc')->simplePaginate(6);
        }

        return view('main.auction', compact('auctions'));
    }

    public function buyNowPage(Request $request){

        if($request->input('search')){
            $products = Product::where('name','like','%' .request('search'). '%')->simplePaginate(6);
        } else{
            $products = Product::orderBy('created_at', 'desc')->simplePaginate(6);
        }

        return view('main.buynow', compact('products'));
    }

    public function productById($id){
        $product = Product::findOrFail($id);
        return view('main.productById', compact('product'));
    }

    public function checkout(){
        // session()->forget('cart');
        return redirect('/payment');
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
        return redirect('/cart')->with('success', 'Product add to cart successfully!');
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

        return redirect('/admin/product/');
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
        return redirect('/admin/product/');
    }

    public function delete($id){
        Product::destroy($id);
        return redirect('/admin/product/');
    }

    // admin auction
    public function adminAuctionDashboard(){
        $auctions = Auction::all();
        return view('admin.auction.dashboard',compact('auctions'));
    }

    public function createAuction(){
        $categories = Category::all();
        return view('admin.auction.createAuction', compact('categories'));
    }

    public function storeAuction(Request $request){

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

        Auction::create([
            'name' => $request->name,
            'description' => $request->description,
            'current_price' => $request->current_price,
            'end_date' => $request->end_date,
            'image' => $fileName,
            'category_id' => $request->CategoryName,
        ]);

        //name dari model => $request->name dari form

        return redirect('/admin/auction/');
    }

    public function editAuction($id){
        $auction = Auction::findOrFail($id);
        return view('admin.auction.editAuction', compact('auction'));
    }

    public function updateAuction(Request $request, $id){

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

        Auction::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'current_price' => $request->current_price,
            'end_date' => $request->end_date,
            'image' => $fileName,
        ]);
        return redirect('/admin/auction/');
    }

    public function deleteAuction($id){
        Auction::destroy($id);
        return redirect('/admin/auction/');
    }
}
