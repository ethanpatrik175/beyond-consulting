<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd(Auth::user()->id);
        $Order = new Order();
        $Order->added_by = Auth::user()->id;
        $Order->firstName = $request->Firstname;
        $Order->lastName = $request->lastname;
        $Order->email = $request->email;
        $Order->address = $request->address;
        $Order->company_name = $request->company_name;
        $Order->city = $request->city;
        $Order->zip = $request->zip;
        $Order->mobile = $request->phone;
        $Order->content = $request->content;
        $total = \Cart::getTotal();
        $Order->total = $total;
        $cart_items = \Cart::getContent();
        
            if ($Order->save()) {
               foreach($cart_items as $order_items){
                     $order_itm = new OrderItem();
                     $order_itm->order_id = $Order->id;
                     $order_itm->product_id = $order_items->id;
                     $order_itm->price = $order_items->price;
                     $order_itm->quantity = $order_items->quantity;
                     $order_itm->save();
               }
            session()->flush('success', 'All Item Cart Clear Successfully !');
                
            $data['type'] = "success";
                $data['message'] = "Product Meta Added Successfuly!.";
                $data['icon'] = 'mdi-check-all';

                return redirect()->route('front.product.promotion')->with($data);
            } else {
                $data['type'] = "danger";
                $data['message'] = "Failed to Add Product Meta, please try again.";
                $data['icon'] = 'mdi-block-helper';

                return redirect()->route('front.product.promotion')->withInput()->with($data);
            }
         
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
