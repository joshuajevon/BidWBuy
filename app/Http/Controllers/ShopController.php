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
            'price' =>$request->price,
            'address' =>$request->address,
            'payment' =>$request->payment
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

    public function verifyPayment($id){
        Shop::where('id','=',$id)->update([
            'payment_status' => 'accepted'
        ]);
        return redirect('/admin/product/list-dashboard');
    }

    public function rejectPayment($id){
        Shop::where('id','=',$id)->update([
            'payment_status' => 'rejected'
        ]);
        return redirect('/admin/product/list-dashboard');
    }

    public function filterPayments(Request $request, $status) {
        $users = Shop::where('payment_status','=', $status)->paginate(10);
        return view('admin.userlist.dashboard', compact('users'));
    }
}
