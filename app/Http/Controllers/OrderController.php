<?php

namespace WeGotIt\Http\Controllers;

use Illuminate\Http\Request;
use WeGotIt\Order;
use WeGotIt\Http\Resources\OrderResource;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return response()->json(OrderResource::collection(Order::where('is_complete', false)->get()));
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

        $business = \WeGotIt\Business::findOrFail($request->business_id);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::retrieve($request->user()->customer_id);

        $charge = \Stripe\Charge::create(['amount' => $request->price * 100 , 'currency' => 'usd', 'source' => $customer->source]);
        $order = $request->user()->orders()->create([
          'price' => $request->price,
          'business_id' => $business->id,
          'description' => $request->items
        ]);
        return response()->json(new OrderResource($order));
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
        Order::destroy($id);
        return response()->json(['message' => 'Success']);
    }

    public function complete($id){
      $order = Order::findOrFail($id);
      $order->is_complete = true;
      $order->save();
    }
}
