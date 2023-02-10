<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TestimonialDataTable extends DataTable
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
            ->addColumn('created_at', function ($row) {
                return $row->created_at->diffForHumans();
            })
            ->addColumn('action', function ($row) {
                return view('admin.inc.action', [
                    'edit'   => 'admin.testimonial.edit',
                    'delete' => 'admin.testimonial.destroy',
                    'data'   => $row
                ]);
            })->addColumn('checkbox', function ($row) {
                return view('admin.inc.action', [
                    'select' => 'admin.testimonial.destroy',
                    'data' => $row
                ]);
            })
            ->rawColumns(['checkbox', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Testimonial $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Testimonial $model)
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
            ->setTableId('testimonial-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
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
            Column::make('checkbox')->title('<input type="checkbox" title="Select All" id="select-all-rows" /> ')->class('title')->searchable(false)->orderable(false)->visible(auth()->user()->can('admin.testimonial.destroy')),
            Column::make('id')
                ->title('No')
                ->data('DT_RowIndex')
                ->searchable(false)
                ->orderable(false),
            Column::make('name'),
            Column::make('created_at'),
            Column::computed('action')->visible((auth()->user()->can('admin.testimonial.edit') || auth()->user()->can('admin.testimonial.destroy'))),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Testimonial_' . date('YmdHis');
    }
}
