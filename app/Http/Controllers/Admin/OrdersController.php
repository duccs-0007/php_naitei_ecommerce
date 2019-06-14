<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use Yajra\Datatables\Datatables;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.orders.index');
    }

    public function getdata()
    {
        $orders = Order::select('id', 'address', 'order_total', 'note', 'accepted', 'user_id');
        return Datatables::of($orders)
            ->addColumn('user_name', function($order){
                return $order->owner->name;
            })
            ->addColumn('action', function($order){
                return '<a href="#" class="genric-btn success accept" id="'.$order->id.'"><i class="fas fa-check-square"></i> '.trans('content.accept').'</a>&nbsp;<a href="#" class="genric-btn danger reject" id="'.$order->id.'"><i class="fas fa-window-close"></i> '.trans('content.reject').'</a>';
            })
            ->editColumn('accepted', function ($order) {
                return $order->accepted ? '<a href="#" class="genric-btn primary small accept" id="'.$order->id.'"><i class="fas fa-check-square"></i> '.trans('orders.accepted').'</a>' : '<a href="#" class="genric-btn danger small accept" id="'.$order->id.'"><i class="fas fa-check-square"></i> '.trans('orders.rejected').'</a>';
            })
            ->rawColumns(['accepted', 'action'])
            ->make(true);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
