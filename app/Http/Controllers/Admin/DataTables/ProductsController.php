<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataTables\DataTablesController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;

class ProductsController extends DataTablesController
{
    public function builder()
    {
        return Product::query();
    }

    function view()
    {
        return view('admin.app.orders.myproducts');
    }
    public function myProducts()
    {
        $myStore = auth('restaurant')->user()->products()->get(['id', 'image', 'name', 'price', 'ready_in', 'short_description']);
        return response()->json([
            'data' => [
                'tableName' => $this->builder->getModel()->getTable(),
                'displayedColumns' => ($this->CustomizedColumnsProducts()) === null ?  array_values($this->getDisplayedColumns()) : $this->CustomizedColumnsProducts(),
                'updatable' => $this->getUpdatableColumnsProducts(),
                'records' => $myStore,
                'allow' => [
                    'creation' => $this->allowCreation,
                ]
            ]
        ]);
    }

    public function store(Request $request)
    {
        auth('restaurant')->user()->products()->create($request->only([
            ...$this->getUpdatableColumnsProducts()
        ]));
    }

    public function CustomizedColumnsProducts()
    {
        return [
            'ID' => 'id',
            'Image' => 'image',
            'Product Name' => 'name',
            'Price (EGP)' => 'price',
            'Ready in (Minutes)' => 'ready_id',
            'Short Description' => 'short_description',
        ];
    }
    public function getUpdatableColumnsProducts()
    {
        return ['image', 'name', 'price', 'ready_in', 'short_description'];
    }
}
