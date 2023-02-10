<?php

namespace App\DataTables;

use App\Models\Device;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DeviceDataTable extends DataTable
{
    private $baseRoute;
    private $baseView;
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,        
    ];
    
    private $mapColumnSearch = [
        //'entity.name' => 'entity_id',
    ];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        if (!empty($this->columnFilterOperator)) {
            foreach ($this->columnFilterOperator as $column => $operator) {
                $columnSearch = $this->mapColumnSearch[$column] ?? $column;
                $dataTable->filterColumn($column, new $operator($columnSearch));                
            }
        }
        return $dataTable->editColumn('additional_info', function($item){            
            return '<div class="badge bg-info">'.implode('</div><div class="badge bg-info">',convertArrayStringPair(extractDeviceInfo($item->additional_info), ' : ')).'</div>';
        })->addColumn('action', function($item){
            return view($this->baseView.'.datatables_actions', array_merge($item->toArray(), ['baseRoute' => $this->getBaseRoute()]));
        })->escapeColumns([]);        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Device $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Device $model)
    {
        return $model->select([$model->getTable().'.*'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'import',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ];
                
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => '<"row" <"col-md-6"B><"col-md-6 text-end"l>>rtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => $buttons,
                 'language' => [
                   'url' => url('vendor/datatables/i18n/en-gb.json'),
                 ],
                 'responsive' => true,
                 'fixedHeader' => true,
                 'orderCellsTop' => true     
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'serial_number' => new Column(['title' => __('models/devices.fields.serial_number'),'name' => 'serial_number', 'data' => 'serial_number', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/devices.fields.name'),'name' => 'name', 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'additional_info' => new Column(['title' => __('models/devices.fields.additional_info'),'name' => 'additional_info', 'data' => 'additional_info', 'searchable' => true, 'elmsearch' => 'text']),
            'attlog_stamp' => new Column(['title' => __('models/devices.fields.attlog_stamp'),'name' => 'attlog_stamp', 'data' => 'attlog_stamp', 'searchable' => true, 'elmsearch' => 'text']),
            // 'operlog_stamp' => new Column(['title' => __('models/devices.fields.operlog_stamp'),'name' => 'operlog_stamp', 'data' => 'operlog_stamp', 'searchable' => true, 'elmsearch' => 'text']),
            // 'attphotolog_stamp' => new Column(['title' => __('models/devices.fields.attphotolog_stamp'),'name' => 'attphotolog_stamp', 'data' => 'attphotolog_stamp', 'searchable' => true, 'elmsearch' => 'text']),
            // 'error_delay' => new Column(['title' => __('models/devices.fields.error_delay'),'name' => 'error_delay', 'data' => 'error_delay', 'searchable' => true, 'elmsearch' => 'text']),
            // 'delay' => new Column(['title' => __('models/devices.fields.delay'),'name' => 'delay', 'data' => 'delay', 'searchable' => true, 'elmsearch' => 'text']),
            // 'trans_times' => new Column(['title' => __('models/devices.fields.trans_times'),'name' => 'trans_times', 'data' => 'trans_times', 'searchable' => true, 'elmsearch' => 'text']),
            // 'trans_interval' => new Column(['title' => __('models/devices.fields.trans_interval'),'name' => 'trans_interval', 'data' => 'trans_interval', 'searchable' => true, 'elmsearch' => 'text']),
            // 'trans_flag' => new Column(['title' => __('models/devices.fields.trans_flag'),'name' => 'trans_flag', 'data' => 'trans_flag', 'searchable' => true, 'elmsearch' => 'text']),
            // 'timezone' => new Column(['title' => __('models/devices.fields.timezone'),'name' => 'timezone', 'data' => 'timezone', 'searchable' => true, 'elmsearch' => 'text']),
            // 'realtime' => new Column(['title' => __('models/devices.fields.realtime'),'name' => 'realtime', 'data' => 'realtime', 'searchable' => true, 'elmsearch' => 'text']),
            // 'encrypt' => new Column(['title' => __('models/devices.fields.encrypt'),'name' => 'encrypt', 'data' => 'encrypt', 'searchable' => true, 'elmsearch' => 'text']),
            // 'server_version' => new Column(['title' => __('models/devices.fields.server_version'),'name' => 'server_version', 'data' => 'server_version', 'searchable' => true, 'elmsearch' => 'text']),
            // 'table_name_stamp' => new Column(['title' => __('models/devices.fields.table_name_stamp'),'name' => 'table_name_stamp', 'data' => 'table_name_stamp', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'devices_datatable_' . time();
    }

    /**
     * Get the value of baseRoute
     */ 
    public function getBaseRoute()
    {
        return $this->baseRoute;
    }

    /**
     * Set the value of baseRoute
     *
     * @return  self
     */ 
    public function setBaseRoute($baseRoute)
    {
        $this->baseRoute = $baseRoute;

        return $this;
    }

    /**
     * Get the value of baseView
     */ 
    public function getBaseView()
    {
        return $this->baseView;
    }

    /**
     * Set the value of baseView
     *
     * @return  self
     */ 
    public function setBaseView($baseView)
    {
        $this->baseView = $baseView;

        return $this;
    }
}
