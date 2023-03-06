<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(){
        return view('admin.createCategory');
    }

    public function storeCategory(Request $request){

        // $request->validate([
        //     'CategoryName' => 'required|unique:categories,CategoryName,except,id',
        // ]);

        Category::create([
            'CategoryName' => $request->CategoryName,
            'slug' => $request->slug,
        ]);
        return redirect('/');
    }
}
