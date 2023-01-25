<?php

namespace App\Repositories;

use App\Models\Device;
use App\Repositories\BaseRepository;

/**
 * Class DeviceRepository
 * @package App\Repositories
 * @version January 25, 2023, 11:02 am WIB
*/

class DeviceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'serial_number',
        'additional_info',
        'attlog_stamp',
        'operlog_stamp',
        'attphotolog_stamp',
        'error_delay',
        'delay',
        'trans_times',
        'trans_interval',
        'trans_flag',
        'timezone',
        'realtime',
        'encrypt',
        'server_version',
        'table_name_stamp'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Device::class;
    }
}
