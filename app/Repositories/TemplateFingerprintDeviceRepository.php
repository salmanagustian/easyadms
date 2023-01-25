<?php

namespace App\Repositories;

use App\Models\TemplateFingerprintDevice;
use App\Repositories\BaseRepository;

/**
 * Class TemplateFingerprintDeviceRepository
 * @package App\Repositories
 * @version January 25, 2023, 11:02 am WIB
*/

class TemplateFingerprintDeviceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'pin',
        'fid',
        'size',
        'valid',
        'tmp'
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
        return TemplateFingerprintDevice::class;
    }

    public function saveTemplate($content, $deviceId){
        $data = [];
        foreach($content as $item){
            $tmp = $this->mappingData($item);
            $tmp['device_id'] = $deviceId;
            $data[] = $tmp;
        }
        $this->model->upsert($data, ['pin','fid','device_id']);
        $this->model->flushCache();
    }
    // FP PIN=1079	FID=6	Size=1160	Valid=1	TMP=SiVTUzIxAAADZmUECAUHCc7QAAAbZ2kBAAAAg4serGZPAHwPlQCmAP9powBuAHQPGwByZpIPyAB+AEMPWmaoAFYPvABwADJqtwC6ADoNggDUZlIOmADfAIMPa2biAE8OPgAsANBrVQDxAFINawD6ZjcPowD7APsPR2b9ANwOVQA7AM9oiAAEAUsPUgAJZ0cPWwAPAZMP5WYhAaQPoQDkAUFoRQAnAdYPAQAqZ6kPpgAtAfYNl2YuAcgNxADyAZVpbgBBAdYPdQBEZ3EOjgBKASYOaeZXCTP6oYivgJgdqHje+R7ynA+IfXIj5feOFm4OeGJiC3+HtPpq7hjIKQqj9BO3RIFeZT8FbgheEU/+mpiPhML94flEgb7kbYuVeb2CAfuyle/xPAud+XD3qnaMjVkJcH/88OofRAQpD1oKCPwWb2gG3Y3KfCcEUZtHEldzcBNYfe6Yi4Bu/34P3BRVEs8F/PPJbUTHtvOYiQHnrfCUK3kCt/SaEkMBMN/CWY+NZR8qDF91nQS1JSAyAQEZFo9lAZ44fcIHxbI7ZTVWDACCRDI4OJnB/sEMAIKI9PxPPcEuCwCsi4CAGGgFAGNbaQdVBWaYX/f/JwzFkWcXfcHAb3YGxZlmm8H9MAoAnql6waeKwG8JAKao/f6YOTELAJ9ytHHBPsL+BQDidN/+LHYBxXqMwsW3g8A8MQsAxICGB8LAGsB7CQDMgdIzw5tWEwEDja1NfMGkwH6DbBUADpePp8Kje8F4PzvAWWwB0J8k/v8E/sOZkAUAsKliAX4FZletVsHAbswAvt4oK3XCBQBsvEqncAUAsLxGRA0D0789/3vDwAbEa28Bur40/1IHkAdmXdBQPQsAUeNKFTn8WQMAmiY9/mABZ+tP/v+9BgM091rE/n4ZxVj5tlLASir9/Tgu/DLBRgQAPf2GKgZmrf09lQQAd/006QIAoP5AwcMApZhBwsLEwgXViAsv/kQHEJUOjMDCnTgDEJoOQzoFEzEXU/9PHhHGFpSbKMBvwsHEAKxoEPzCwfzAWtgQ/niSIv3/wnU6yMujwMDAwsDAOML8pv/A/v8DEFskTKYFEMgsEHjBEMtfCGwDEI5WrsEJdpNL6f77/wRFwm0R/1aDwP8EhsMLBxDkXIOFBFJBZgpDAQAAC4BS
    private function mappingData($item){
        return [            
            'pin' => $item['PIN'],                        
            'fid' => $item['FID'],
            'size' => $item['Size'],
            'valid' => $item['Valid'],
            'tmp' => $item['TMP']
        ];
    }
}
