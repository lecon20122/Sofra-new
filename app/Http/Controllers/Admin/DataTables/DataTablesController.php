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
    protected $allowCreation = true;

    public function __construct()
    {
        $builder = $this->builder();

        if (!$builder instanceof Builder) {
            throw new Exception('Entity builder not instance of Builder');
        }

        $this->builder = $builder;
    }


    abstract public function builder();

    public function index(Request $request)
    {
        return response()->json([
            'data' => [
                'tableName' => $this->builder->getModel()->getTable(),
                'displayedColumns' => ($this->CustomizedColumnsNames()) === null ?  array_values($this->getDisplayedColumns()) : $this->CustomizedColumnsNames(),
                'updatable' => $this->getUpdatableColumns(),
                'records' => $this->getRecords($request->limit),
                'allow' => [
                    'creation' => $this->allowCreation,
                ]

            ]
        ]);
    }

    /**
     * update
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->builder()->find($id)->update($request->only($this->getUpdatableColumns()));
    }

    /**
     * Storing into Database
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if (!$this->allowCreation) {
            return;
        }

        $this->builder()->create($request->only($this->getUpdatableColumns()));
    }

    /**
     * Undocumented function
     *
     * @param [type] $limit
     * @return void
     */
    protected function getRecords($limit)
    {
        return $this->builder->limit($limit)->orderBy('id')->get($this->getDisplayedColumns());
    }


    public function getDisplayedColumns()
    {
        return array_diff($this->getDatabaseColumns(), $this->builder->getModel()->getHidden());
    }
    public function getUpdatableColumns()
    {
        return $this->getDisplayedColumns();
    }

    protected function getDatabaseColumns()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }

    public function CustomizedColumnsNames()
    {
        // return ['ID', 'Restaurant', 'Client', 'Address', 'Cost', 'Total', 'State', 'Submitted at'];
    }
}
