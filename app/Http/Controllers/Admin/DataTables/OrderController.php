<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataTables\DataTablesController;
use App\Models\Order;

class OrderController extends DataTablesController
{
    public function builder()
    {
        return Order::query();
    }



    function view()
    {
        return view('admin.app.orders.index');
    }

    function getRecords($limit)
    {

        $records =  Order::with(['restaurant' , 'user'])->get(['id', 'restaurant_id', 'user_id','address','cost','delivery_fees', 'commission','total','net','state','created_at']);
            foreach ($records as $key => $record) {

                $data[$key] = [
                'id' => $record->id,
                'restaurant_id' => $record->restaurant->name,
                'user_id' => $record->user->name,
                'address' => $record->address,
                'cost' => $record->cost,
                'Delivery' => $record->delivery_fees,
                'total' => $record->total,
                'commission' => $record->commission,
                'net' => $record->net,
                'state' => $record->state,
                'created_at' => $record->created_at->diffForHumans(),
                ];
            }
         return  $data;
    }

    public function CustomizedColumnsNames()
    {
        return ['ID'=>'id','Restaurant' => 'restaurant_id','Client'=> 'user_id','Address'=> 'address', 'Cost'=> 'cost','Delivery' => 'delivery_fees','Total'=> 'total', 'Commission' => 'commission','Net' => 'net','State'=>'state','Submitted at'=> 'created_at'];
    }

    public function getUpdatableColumns()
    {
        return ['state' , 'address'];
    }


}
