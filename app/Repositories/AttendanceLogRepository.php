<?php

namespace App\Repositories;

use App\Models\AttendanceLog;
use App\Repositories\BaseRepository;

/**
 * Class AttendanceLogRepository
 * @package App\Repositories
 * @version January 25, 2023, 11:02 am WIB
*/

class AttendanceLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'pin',
        'fingertime',
        'status',
        'verify',
        'work_code',
        'reserved'
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
        return AttendanceLog::class;
    }

    public function saveAttendance($content, $deviceId){
        $data = [];
        foreach($content as $item){
            $tmp = $this->mappingData($item);
            $tmp['device_id'] = $deviceId;
            $data[] = $tmp;
        }
        $this->model->upsert($data, ["device_id", "pin", "fingertime"]);
        $this->model->flushCache();
    }
                
    // PIN=5519	Name=Setiasih	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
    private function mappingData($item){
        return [            
            'pin' => $item[0],
            'pin' => $item[0],
            'fingertime' => $item[1].' '.$item[2],
            'status' => $item[3],
            'verify' => $item[4],
            'work_code' => $item[5],
            'reserved' => $item[6]
        ];
    }
}
