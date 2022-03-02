<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();
        return view('backend.admin.order.index',  compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Orders::all();
        return view('backend.admin.order.create', compact('orders'));   
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders = new Orders();
        $orders->status       = $request->status;
        $orders->code         = $request->code;
        $orders->customer_id  = $request->customer_id;
        $orders->save();

        //luu cau thong bao vao session
        session()->flash('thong_bao', 'Lưu thành công');

        //chuyen huong
        return redirect()->route('order.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Orders::find($id);
        return view('backend.admin.orders.edit', compact('orders'));

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
        $orders = Orders::find($id);
        $orders->status = $request->get('status');
        return redirect()->route('order.index')->with('success', 'Chỉnh sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orders::find($id)->delete();
        return redirect()->back()->with('error', 'Xóa thành công');

    }
}
