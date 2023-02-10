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
                return view('admin.inc.action', [
                    'select' => 'admin.user.destroy',
                    'data' => $row
                ]);
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
            ->addColumn(['data' => 'checkbox','visible'=>auth()->user()->can('admin.user.destroy'), 'orderable' => false, 'searchable' => false, 'title' => '<input type="checkbox" title="Select All" id="select-all-rows" /> ', 'class' => 'title'])
            ->addColumn(['data' => 'name', 'title' => 'Name'])

            ->addColumn(['data' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'role', 'title' => 'Role'])
            ->addColumn(['data' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'action', 'title' => 'Action','visible'=> auth()->user()->can('admin.testimonial.edit') || auth()->user()->can('admin.testimonial.destroy')])
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
