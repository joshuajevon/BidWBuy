<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function payment(){
        return view('user.payment');
    }

    public function storeShop(Request $request){
        $user_id = Auth::user()->id;
        Shop::create([
            'user_id' => $user_id,
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' =>$request->price
        ]);
        session()->forget('cart');
        return redirect('user-dashboard/');
    }

    public function userDashboard(){
        $dashboards = Shop::all();
        return view('user.dashboard', compact('dashboards'));
    }

    public function listDashboard(){
        $users = Shop::all();
        return view('admin.userlist.dashboard', compact('users'));
    }
}
