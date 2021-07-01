<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataTables\DataTablesController;
use App\Models\User;

class UsersController extends DataTablesController
{
    public function builder()
    {
        return User::query();
    }

    function view()
    {
        return view('admin.app.users.index');
    }

    public function CustomizedColumnsNames()
    {
        return ['ID'=>'id', 'Name'=>'name', 'Email'=>'email', 'Address'=>'address', 'Phone'=>'phone'];
    }

    public function getDisplayedColumns()
    {
        return ['id', 'name', 'email', 'address', 'phone'];
    }

    public function getUpdatableColumns()
    {
        return null;
    }

}
