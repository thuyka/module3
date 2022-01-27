<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaculateController extends Controller
{
    public function Caculate(Request $request) {
        $productDescription = $request->productDescription;
        $price = $request->price;
        $discountPercent = $request->discountPercent;
        $discountAmount = $price * $discountPercent * 0.01;
        $discountPrice = $price - $discountAmount;
        return view('result', compact('discountAmount', 'discountPrice'));
    }
}
