<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataTables\DataTablesController;
use App\Models\Order;
use App\Models\Restaurant;

class StoreController extends DataTablesController
{
    protected $allowCreation = false;

    public function builder()
    {
        return Restaurant::query();
    }

    function view()
    {
        return view('admin.app.orders.myOrders');
    }
    function myStoreView()
    {
        return view('admin.app.orders.mystore');
    }

    //returning Store - Orders
    function getRecords($limit)
    {

        $records =  Order::whereHas('user', function ($query) {
            return $query->where('restaurant_id', auth('restaurant')->user()->id);
        })->get(['id', 'restaurant_id', 'user_id', 'address', 'cost', 'delivery_fees', 'commission', 'total', 'net', 'state', 'created_at']);

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
    //for - Orders
    public function CustomizedColumnsNames()
    {
        return [
            'ID' => 'id',
            'Store Name' => 'name',
            'Client' => 'user_id',
            'Address' => 'address',
            'Cost' => 'cost',
            'Delivery' => 'delivery_fees',
            'Total' => 'total',
            'Commission' => 'commission',
            'Net Value' => 'net',
            'State' => 'state',
            'Submitted at' => 'created_at',
        ];
    }

    public function myStore()
    {
        $myStore = Restaurant::where('id', auth('restaurant')->user()->id)->get(['id', 'image', 'name', 'email', 'phone', 'address', 'is_active', 'is_approved']);
        return response()->json([
            'data' => [
                'tableName' => $this->builder->getModel()->getTable(),
                'displayedColumns' => ($this->CustomizedColumnsNamesStore()) === null ?  array_values($this->getDisplayedColumns()) : $this->CustomizedColumnsNamesStore(),
                'updatable' => $this->getUpdatableColumnsStore(),
                'records' => $myStore,
                'allow' => [
                    'creation' => $this->allowCreation,
                ]
            ]
        ]);
    }

    public function CustomizedColumnsNamesStore()
    {
        return [
            'ID' => 'id',
            'Image' => 'image',
            'Store Name' => 'name',
            'Email' => 'email',
            'phone' => 'phone',
            'Address' => 'address',
            'is Active' => 'is_active',
            'is Approved' => 'is_approved',
        ];
    }

    public function getUpdatableColumnsStore()
    {
        return ['image', 'email', 'phone', 'address', 'is_active'];
    }

    public function getUpdatableColumns()
    {
        return ['state'];
    }

    public function logout()
    {
        $logout = auth('restaurant');
        $logout->logout();
        return redirect()->route('restaurantLogin');
    }
}
