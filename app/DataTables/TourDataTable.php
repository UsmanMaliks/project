<?php

namespace App\DataTables;

use App\Models\Tour;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TourDataTable extends DataTable
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
            ->addColumn('Picture', function ($data) {
                $url=asset("storage/tour/$data->image");
                return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->addColumn('Active', function ($data) {
                if($data->is_active == 1)
                {
                    $button = '<button type="button" name="active" id="'.$data->id.'" class="active btn btn-success btn-sm">Active</button>';
                }
                else{
                    $button = '<button type="button" name="active" id="'.$data->id.'" class="active btn btn-danger btn-sm">Not Active</button>';
                }
                return $button;
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tour $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tour $model)
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
        ->setTableId('user_table')
        ->columns($this->getColumns())
        ->dom('Bfrtip')
        ->minifiedAjax()
        ->orderBy(1)
        ->buttons(
            Button::make('create'),
            Button::make('export'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
        );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('Picture'),
            Column::make('day'),
            Column::make('city_to'),
            Column::make('distance'),
            Column::make('tour_type'),
            Column::make('season'),
            Column::make('trip_date'),
            Column::make('max_person'),
            Column::make('Active'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Tour_' . date('YmdHis');
    }
}
