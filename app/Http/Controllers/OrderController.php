<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;



class OrderController extends Controller
{
    public $buttons;
    public $section;

    public function __construct()
    {
        $this->section = "Order";
    }
    public function buttons()
    {
        $this->buttons = '';
        $this->buttons .= '<a href="'.route("orders.index").'" class="btn btn-sm btn-success">ALL '.strtoupper($this->section).'</a> &nbsp;';
        // $this->buttons .= '<a href="'.route("speakers.create").'" class="btn btn-sm btn-primary">ADD NEW</a> &nbsp;';
        // $this->buttons .= '<a href="'.route('speakers.trash').'" class="btn btn-sm btn-danger">TRASH</a>';

        return $this->buttons;
    }
    public function index(Request $request)
    {
        // $data = Order::whereNull('deleted_at')->with(['addedBy', 'updatedBy'])->get();
        // dd($data);
        if($request->ajax())
        {
            $data = Order::whereNull('deleted_at')->with(['addedBy', 'updatedBy'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function($row){
                    return '<input type="checkbox" class="checkbox" name="checkbox[]" value="'.$row->id.'">';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('orders.show', $row->id).'" target="_blank" class="text-success"><i title="Show" class="fas fa-eye font-size-18"></i></a>&nbsp;&nbsp;';
                    $btn .= '<a href="'.route('orders.edit', $row->id).'" target="_blank" ><i title="Edit" class="fas fa-edit font-size-18"></i></a>';
                    $btn .= ' <a href="javascript:void(0);" data-toggle="tooltip" onClick="deleteRecord('.$row->id.')" data-original-title="Delete" class="text-danger"><i title="Delete" class="fas fa-trash-alt font-size-18"></i></a>';
                    return $btn;
                })
                ->addColumn('created_at', function($row){
                    return date('d-m-Y', strtotime($row->created_at)).'<br /><label class="text-primary">By: '.$row->addedBy->first_name.' '.$row->addedBy->last_name.'</label>';
                })
                ->addColumn('updated_at', function($row){
                    if(isset($row->updatedBy)){
                        return date('d-m-Y', strtotime($row->updated_at)).'<br /><label class="text-primary">By: '.$row->updatedBy->first_name.' '.$row->updatedBy->last_name.'</label>';
                    }
                })
                // ->addColumn('name', function($row){
                //     if(isset($row->updatedBy)){
                //         return date('d-m-Y', strtotime($row->updated_at)).'<br /><label class="text-primary">By: '.$row->firstName.' '.$row->lastName.'</label>';
                //     }
                // })
                ->addColumn('name', function($row){
                    return Str::of("Name:".'&nbsp;'.$row->firstName.'&nbsp;'.$row->lastName.'<br/>'."Email:".'&nbsp;'.$row->email.'<br/>'."Mobile:".'&nbsp;'.$row->email) ->limit(100);
                })
                ->addColumn('order', function($row){
                    return Str::of($row->order_number) ->limit(100);
                })
                ->addColumn('order_status', function($row){
                    return Str::of($row->order_status) ->limit(100);
                })
                ->addColumn('total', function($row){
                    return Str::of("$".$row->total) ->limit(100);
                })
                // ->addColumn('status', function($row){
                //     if ($row->is_active == 0) {
                //         $btn0 = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="status" switch="bool" data-id="' . $row->id . '" value="1"/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                //         return $btn0;
                //     }else if($row->is_active == 1) {

                //         $btn1 = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="status" switch="bool" data-id="' . $row->id . '" value="0" checked/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                //         return $btn1;
                //     }
                // })
                ->addColumn('image', function($row){
                    return '<img src="'.asset('assets/frontend/images/speakers/'.Str::of($row->image)->replace(' ', '%20')).'" width="50" height="50" />';
                })
                ->rawColumns(['action', 'created_at', 'updated_at','checkbox', 'image', 'status','name','order','order_status','total'])
                ->make(true);
        }
        
        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "All ".$this->section;
        // dd($data);
        return view('backend.orders.index', $data);
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
        $Order = new Order();
        $id = Auth::user()->id;
        $Order->added_by = Auth::user()->id;
        $date = Carbon::now();
        $ids = $date->format('YmdHis');
        $Order->order_number = "ES".$ids;
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
    public function show($id)
    {
        $data['order'] = Order::findOrFail($id);
        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "View ".Str::singular($this->section).' Detail';

        return view('backend.orders.show', $data);
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
