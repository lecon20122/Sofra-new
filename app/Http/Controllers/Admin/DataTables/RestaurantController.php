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

    public function getDisplayedColumns()
    {
        return ['id','image','name','email','address','phone','is_approved'];
    }

    public function getUpdatableColumns()
    {
        return ['name','image', 'email', 'address', 'phone', 'is_approved'];
    }

    public function CustomizedColumnsNames()
    {
        return ['ID'=>'id','Image'=>'image','Name'=>'name','Email'=>'email','Address'=>'address','Phone'=>'phone','is Approved'=>'is_approved'];
    }
}
