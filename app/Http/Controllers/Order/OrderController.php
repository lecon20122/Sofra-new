<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $myOrder = Order::where('user_id' , $request->user()->id)->with('restaurant' , 'products')->get();
        return $myOrder;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $restaurant = Restaurant::find($request->restaurant_id);
            //check if the restaurant is open
            if ($restaurant->is_active === false) {
                return response()->json("Restaurant Closed at the time , come back later", 200);
            }
            $order = $request->user()->orders()->create([
                'restaurant_id' => $request->restaurant_id,
                'notes' => $request->notes,
                'state' => 'pending',
                'address' => $request->address,
                'payment_type_id' => 1,
            ]);

            $cost = 0;
            $delivery_cost = $restaurant->delivery_fees;

            $items = Cart::where('user_id', $request->user()->id)->get();
            foreach ($items as $item) {

                $product = Product::find($item->product_id);

                $readyProduct = [
                    $item['product_id'] => [
                        'qty' => (isset($item->qty)) ? $item->qty : 1,
                        'price' => $product->price,
                        'notes' => (isset($item->notes)) ? $item->notes : '',
                    ],
                ]; //end ready products

                //attaching the order info to pivot table
                $order->products()->attach($readyProduct);
                //calculating the cost
                $cost += ($product->price * $item->qty);

            }
            //minimum charge
            if ($cost >= $restaurant->min_order) {
                $total = $cost + $delivery_cost;
                $commission = settings('commission')->value * $cost;
                $net = $total - $commission;
                // updating the rest of the calculations
                $update = $order->update([
                    'total' => $total,
                    'cost' => $cost,
                    'delivery_fees' => $delivery_cost,
                    'commission' => $commission,
                    'net' => $net,
                ]);
            }

            $restaurant->notifications()->create([
                'title' => 'You Have a New Order',
                'content' => 'you have new order from '  . $request->user()->name . ' and Total Price is  ' . $total,
                'order_id' => $order->id,
            ]);
            Cart::where('user_id' , $request->user()->id)->delete();
            DB::commit();
            return response()->json('Order Placed Successfully',200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Something wrong with thr Order',200);
        }
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
