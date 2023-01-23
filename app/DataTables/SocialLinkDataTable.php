<?php

namespace App\DataTables;

use App\Models\SocialLink;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SocialLinkDataTable extends DataTable
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
                    'edit'   => 'admin.social-links.edit',
                    'delete' => 'admin.social-links.destroy',
                    'data'   => $row
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SocialLinkDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SocialLink $model)
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
            ->setTableId('social_link_table')
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
            Column::make('id')
                ->title('No')
                ->data('DT_RowIndex')
                ->searchable(false)
                ->orderable(false),
            Column::make('name'),
            Column::make('icon'),
            Column::make('url'),
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
        return 'SocialLink_' . date('YmdHis');
    }
}
