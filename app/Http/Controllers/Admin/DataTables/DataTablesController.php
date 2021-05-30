<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

abstract class DataTablesController extends Controller
{
    protected $builder;

    public function __construct()
    {
        $builder = $this->builder();

        if (!$builder instanceof Builder) {
            throw new Exception('Entity builder not instance of Builder');
        }

        $this->builder = $builder;
    }


    abstract public function builder();

    public function index()
    {
        return response()->json([
            'data' => [
                'displayedColumns' => array_values($this->getDisplayedColumns()),
                'records' => $this->getRecords(),
            ]
        ]);
    }

    protected function getRecords()
    {
        return $this->builder->get($this->getDisplayedColumns());
    }

    public function getDisplayedColumns()
    {
        return array_diff($this->getDatabaseColumns() , $this->builder->getModel()->getHidden());
    }

    protected function getDatabaseColumns()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }
}
