<?php

namespace App\Repositories;

use App\Models\UserDevice;
use App\Repositories\BaseRepository;

/**
 * Class UserDeviceRepository
 * @package App\Repositories
 * @version January 25, 2023, 11:02 am WIB
*/

class UserDeviceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'pin',
        'name',
        'pri',
        'passwd',
        'card',
        'grp',
        'tz',
        'verify',
        'vice_card',
        'start_datetime',
        'end_datetime'
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
        return UserDevice::class;
    }

    public function saveUser($content, $deviceId){
        $data = [];
        foreach($content as $item){
            $tmp = $this->mappingData($item);
            $tmp['device_id'] = $deviceId;
            $data[] = $tmp;
        }
        $this->model->upsert($data, ['pin','device_id']);
        $this->model->flushCache();
    }
    // PIN=5519	Name=Setiasih	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
    private function mappingData($item){
        return [            
            'pin' => $item['PIN'],
            'name' => $item['Name'],
            'pri' => $item['Pri'],
            'passwd' => $item['Passwd'],
            'card' => $item['Card'],
            'grp' => $item['Grp'],
            'tz' => $item['TZ'],
            'verify' => $item['Verify'],
            'vice_card' => $item['ViceCard'],
            'start_datetime' => null,
            'end_datetime' => null
        ];
    }
}
