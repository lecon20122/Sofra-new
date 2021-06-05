<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataTables\DataTablesController;
use App\Models\Restaurant;

class RestaurantController extends DataTablesController
{
    public function builder()
    {
        return Restaurant::query();
    }

    function view()
    {
        return view('admin.app.restaurant.index');
    }

    public function index()
    {
        $restaurant =
            Restaurant::
            withSum('orders', 'total')
            ->withSum('orders', 'commission')
            ->withSum('orders', 'net')
            ->get($this->getDisplayedColumns());

        // return response()->json([
        //     'data' => [
        //         'displayedColumns' => array_values($this->getDisplayedColumns()),
        //         'records' => $restaurant,
        //     ]
        // ]);
        return $restaurant;
    }

    public function getDisplayedColumns()
    {
        return ['id', 'name', 'email', 'address', 'phone', 'delivery_fees', 'min_order', 'is_active', 'is_approved'];
    }
}
