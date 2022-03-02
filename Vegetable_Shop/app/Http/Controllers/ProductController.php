<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('backend.admin.product.index',  compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = Products::all();
        $categories = Categories::all();
        $params = [
            // 'products'=>$products,
            'categories'=>$categories
        ];
        return view('backend.admin.product.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //neu OK 
        //luu vao CSDL
        $objProduct       = new Products();
        $objProduct->name = $request->name;
        if ($request->hasFile('image')) {
            // tao 1 bien tro toi image
            $get_image    = $request->image;
            // tao file dung anh
            $path                = 'public/upload/';
            $get_name_image      = $get_image->getClientOriginalName();
            $name_image          = current(explode('.', $get_name_image));
            $new_image           = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $objProduct->image   = $new_image;
        }
        $objProduct->price       = $request->price;
        $objProduct->description = $request->description;
        $objProduct->quantity    = $request->quantity;
        $objProduct->category_id = $request->category_id;
        $objProduct->save();

        //luu cau thong bao vao session
        // session()->flash('thong_bao', 'Lưu thành công');

        //chuyen huong
        return redirect()->route('products.index')->with('success', 'Tạo mới thành công');;
        // dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        $params = [
            "product"   => $product
        ];
        return view('backend.index', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        $categories = Categories::all();
        $params = [
            "products"   => $products,
            "categories"   => $categories
        ];
        return view('backend.admin.product.edit',  $params);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->name = $request->get('name');
        if ($request->hasFile('image')) {
            // tao 1 bien tro toi image
            $get_image          = $request->get('image');
            // tao file dung anh
            $path               = 'public/upload/';
            $get_name_image     = $get_image->getClientOriginalName();
            $name_image         = current(explode('.', $get_name_image));
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $products->image    = $new_image;
        }
        $products->price       = $request->get('price');
        $products->description = $request->get('description');
        $products->quantity    = $request->get('quantity');
        $products->category_id = $request->get('category_id');
        $products->save();
        session()->flash('thong_bao', 'Lưu thành công');

        //chuyen huong va hien thong bao cap naht thanh cong
        return redirect()->route('products.index')->with('success', 'Chỉnh sửa thành công');;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect()->back()->with('error', 'Xóa thành công');

    }
}
