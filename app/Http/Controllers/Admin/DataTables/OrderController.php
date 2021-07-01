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

        $records =  Order::with(['restaurant' , 'user'])->get(['id', 'restaurant_id', 'user_id','address','cost','total','State','created_at']);
            foreach ($records as $key => $record) {

                $data[$key] = [
                'id' => $record->id,
                'restaurant_id' => $record->restaurant->name,
                'user_id' => $record->user->name,
                'address' => $record->address,
                'cost' => $record->cost,
                'total' => $record->total,
                'State' => $record->State,
                'created_at' => $record->created_at,
                ];
            }
         return  $data;
    }

    public function CustomizedColumnsNames()
    {
        return ['ID'=>'id','Restaurant' => 'restaurant_id','Client'=> 'user_id','Address'=> 'address', 'Cost'=> 'cost','Total'=> 'total','State'=> 'State','Submitted at'=> 'created_at'];
    }

    public function getUpdatableColumns()
    {
        return null;
    }


}
