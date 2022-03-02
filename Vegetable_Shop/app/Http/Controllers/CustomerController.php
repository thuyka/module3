<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();
        return view('backend.admin.customer.index',  compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $customers = Customers::all();
    return view('backend.admin.customer.create', compact('customers'));   
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customers = new Customers([
            'name' => $request->get('name'),  
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
        ]);
        $customers->save();
        session()->flash('thong_bao', 'Lưu thành công');
        return redirect()->route('customers.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('backend.admin.customer.edit', compact('customers'));
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
        $customers = Customers::findOrFail($id);
        $customers->name = $request->input('name');
        $customers->email = $request->input('email');
        $customers->address = $request->input('address');
        $customers->phone = $request->input('phone');
        $customers->save();

        //dung session de dua ra thong bao
        session()->flash('thong_bao', 'Lưu thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::find($id)->delete();
        return redirect()->back();
    }
}
