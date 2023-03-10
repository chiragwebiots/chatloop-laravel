<?php

namespace App\DataTables;

use App\Models\PricingPlan;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PricingPlanDataTable extends DataTable
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
                    'edit'   => 'admin.pricing-plan.edit',
                    'delete' => 'admin.pricing-plan.destroy',
                    'data'   => $row
                ]);
            })->addColumn('checkbox', function ($row) {

                return '<input type="checkbox" name="row" class="rowClass" value=' . $row->id . ' id="rowId' . $row->id . '">';
            })
            ->rawColumns(['checkbox', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PricingPlan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PricingPlan $model)
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
            ->setTableId('pricingplan-table')
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
            Column::make('checkbox')->title('<input type="checkbox" title="Select All" id="select-all-rows" /> ')->class('title')->searchable(false)->orderable(false),
            Column::make('id')
                ->title('No')
                ->data('DT_RowIndex')
                ->searchable(false)
                ->orderable(false),
            Column::make('title'),
            Column::make('created_at'),
            Column::computed('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PricingPlan_' . date('YmdHis');
    }
}
