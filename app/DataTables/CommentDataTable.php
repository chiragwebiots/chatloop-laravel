<?php

namespace App\DataTables;

use App\Helpers\Helpers;
use App\Models\Comment;
use App\Models\ThemeOption;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CommentDataTable extends DataTable
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
                    'edit'   => 'admin.comment.edit',
                    'delete' => 'admin.comment.destroy',
                    'data'   => $row
                ]);
            })
            ->addColumn('status', function ($row) {
                return view('admin.inc.status', [
                    'type' => 'Page',
                    'data' => $row
                ]);
            })
            ->addColumn('is_approved', function ($row) {
                return view('admin.inc.action', [
                    'toggle' => 'admin.comment.edit',
                    'data' => $row
                ]);
            })
            ->rawColumns(['is_approved', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Comment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Comment $model)
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
            ->setTableId('comment-table')
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
            Column::make('id')
            ->title('No')
            ->data('DT_RowIndex')
            ->searchable(false)
            ->orderable(false),
            Column::make('name'),
            Column::make('email'),
            Column::make('message'),
            Column::make('is_approved')->visible(Helpers::isCommentApproved()),
            Column::make('created_at'),
            Column::computed('action')->visible((auth()->user()->can('admin.comment.edit') || auth()->user()->can('admin.comment.destroy'))),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Comment_' . date('YmdHis');
    }
}
