<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orderdetail;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //frontend
    public function home()
    {
        $products = Products::all();
        return view('frontend.content.home', compact('products'));
    }
    public function orderdetail() {
        $orders = Orderdetail::all();
        return view('frontend.content.orderdetail', compact('orders'));
    }
    public function cart() {
        return view('frontend.content.cart');
    }
    public function productdetail($id) {
        $category = Categories::orderBy('id', 'DESC')->get();
        $product  = Products::where('id', $id)->first();
        return view('frontend.content.productdetail')->with(compact('category', 'product'));
    }
}

