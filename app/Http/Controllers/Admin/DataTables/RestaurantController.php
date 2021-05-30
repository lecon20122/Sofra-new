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
            Restaurant::with('orders')
            ->withSum('orders', 'total')
            ->withSum('orders', 'commission')
            ->withSum('orders', 'net')
            ->get();
        return response()->json([
            'data' => [
                'displayedColumns' => array_values($this->getDisplayedColumns()),
                'records' => $restaurant,
            ]
        ]);
    }

    // public function getDisplayedColumns()
    // {
    //     return ['name'];
    // }
}
