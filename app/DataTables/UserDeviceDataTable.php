<?php

namespace App\DataTables;

use App\Models\UserDevice;
use App\DataTables\BaseDataTable as DataTable;
use App\Models\Device;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class UserDeviceDataTable extends DataTable
{
    private $baseRoute;
    private $baseView;
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'device_id' => \App\DataTables\FilterClass\MatchKeyword::class,        
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
        return $dataTable->addColumn('action', function($item){
            return view($this->baseView.'.datatables_actions', array_merge($item->toArray(), ['baseRoute' => $this->getBaseRoute()]));
        });        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserDevice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserDevice $model)
    {
        return $model->select([$model->getTable().'.*'])->with(['device'])->newQuery();
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
        $deviceItem = convertArrayPairValueWithKey(['' => 'choose'] + Device::pluck('serial_number', 'id')->toArray());
        return [
            'device_id' => new Column(['title' => __('models/userDevices.fields.device_id'),'name' => 'device_id', 'data' => 'device.serial_number', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $deviceItem]),
            'pin' => new Column(['title' => __('models/userDevices.fields.pin'),'name' => 'pin', 'data' => 'pin', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/userDevices.fields.name'),'name' => 'name', 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'pri' => new Column(['title' => __('models/userDevices.fields.pri'),'name' => 'pri', 'data' => 'pri', 'searchable' => true, 'elmsearch' => 'text']),
            'passwd' => new Column(['title' => __('models/userDevices.fields.passwd'),'name' => 'passwd', 'data' => 'passwd', 'searchable' => true, 'elmsearch' => 'text']),
            'card' => new Column(['title' => __('models/userDevices.fields.card'),'name' => 'card', 'data' => 'card', 'searchable' => true, 'elmsearch' => 'text']),
            'grp' => new Column(['title' => __('models/userDevices.fields.grp'),'name' => 'grp', 'data' => 'grp', 'searchable' => true, 'elmsearch' => 'text']),
            'tz' => new Column(['title' => __('models/userDevices.fields.tz'),'name' => 'tz', 'data' => 'tz', 'searchable' => true, 'elmsearch' => 'text']),
            'verify' => new Column(['title' => __('models/userDevices.fields.verify'),'name' => 'verify', 'data' => 'verify', 'searchable' => true, 'elmsearch' => 'text']),
            'vice_card' => new Column(['title' => __('models/userDevices.fields.vice_card'),'name' => 'vice_card', 'data' => 'vice_card', 'searchable' => true, 'elmsearch' => 'text']),
            'start_datetime' => new Column(['title' => __('models/userDevices.fields.start_datetime'),'name' => 'start_datetime', 'data' => 'start_datetime', 'searchable' => true, 'elmsearch' => 'text']),
            'end_datetime' => new Column(['title' => __('models/userDevices.fields.end_datetime'),'name' => 'end_datetime', 'data' => 'end_datetime', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_devices_datatable_' . time();
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
