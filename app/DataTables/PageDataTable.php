<?php

namespace App\DataTables;

use App\Models\Page;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PageDataTable extends DataTable
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
            ->addColumn('author', function ($row) {
                return $row->createdBy->name;
            })
            ->addColumn('status', function ($row) {
                return view('admin.inc.status', [
                    'type' => 'Page',
                    'data' => $row
                ]);
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                return view('admin.inc.action', [
                    'edit'   => 'admin.page.edit',
                    'delete' => 'admin.page.destroy',
                    'data'   => $row
                ]);
            })->addColumn('checkbox', function ($row) {
                return view('admin.inc.action', [
                    'select' => 'admin.page.destroy',
                    'data' => $row
                ]);
            })
            ->rawColumns(['checkbox', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Page $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Page $model)
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
            ->setTableId('page-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('checkbox')->title('<input type="checkbox" title="Select All" id="select-all-rows" /> ')->class('title')->searchable(false)->orderable(false)->visible(auth()->user()->can('admin.page.destroy')),
            Column::make('id')
                ->title('No')
                ->data('DT_RowIndex')
                ->searchable(false)
                ->orderable(false),
            Column::make('title'),
            Column::make('author'),
            Column::make('status'),
            Column::make('created_at'),
            Column::computed('action')->visible((auth()->user()->can('admin.page.edit') || auth()->user()->can('admin.page.destroy'))),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Page_' . date('YmdHis');
    }
}
