<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('role', function ($row) {
                return $row->getRoleNames()->first();
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                if ($row->getRoleNames()->first() == 'Admin') {
                    return '<p class="text-success">System Reserved</p>';
                }
                return view('admin.inc.action', [
                    'edit'   => 'admin.user.edit',
                    'delete' => 'admin.user.destroy',
                    'data'   => $row
                ]);
            })->addColumn('checkbox', function ($row) {

                if ($row->getRoleNames()->first() == 'Admin') {
                    return '<input type="checkbox" id="disable-select" disabled> ';
                }
                return '<input type="checkbox" name="row" class="rowClass" value=' . $row->id . ' id="rowId' . $row->id . '">';
            })
            ->rawColumns(['checkbox', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->addColumn(['data' => 'checkbox', 'orderable' => false, 'searchable' => false, 'title' => '<input type="checkbox" title="Select All" id="select-all-rows" /> ', 'class' => 'title'])
            ->addColumn(['data' => 'name', 'title' => 'Name'])

            ->addColumn(['data' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'role', 'title' => 'Role'])
            ->addColumn(['data' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'title' => 'Action'])
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters(['stateSave' => true]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
