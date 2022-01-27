<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function validationEmail(Request $request) {
        //Lấy dữ liệu email từ URL
        $email = $request->email;
        $isEmail = true;
        // kiểm tra vakidate email theo hàm mặc định thư viện PHP
        if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isEmail = false;
        }
        return view("index", compact("isEmail"));
    }
}
