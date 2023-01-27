<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use App\Models\Device;
use App\Repositories\AttendanceLogRepository;
use App\Repositories\TemplateFingerprintDeviceRepository;
use App\Repositories\UserDeviceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CdataPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sn = $request->get('SN');
        $table = $request->get('table');
        $stamp = $request->get('Stamp');
        $content = $request->getContent();
        $result = 0;
        $device = Device::firstOrCreate(['serial_number' => $sn]);
        switch($table){
            case 'ATTLOG':
                $result = $this->saveAttendanceLog($content, $device);
                break;
            case 'OPERLOG':
                $result = $this->saveOperationLog($content, $device);
                break;
            default;
        }
        if($device->attlog_stamp != $stamp){
            $device->attlog_stamp = $stamp;
            $device->save();
        }        

        $textResponse = <<<STR
OK: {$result}
STR;        
        return response($textResponse, 200)
        ->header('Content-Type', 'text/plain')
        ->header('Content-length', strlen($textResponse));
    }

    public function devicemd(Request $request)
    {                
        $textResponse = <<<STR
OK: 
STR;        
        return response($textResponse, 200)
        ->header('Content-Type', 'text/plain')
        ->header('Content-length', strlen($textResponse));
    }    

    private function saveAttendanceLog($content, $device){
        $attLog = extractDataLogAttendance($content);
        $count = count($attLog);
        
        if($count  > 0){
            (new AttendanceLogRepository())->saveAttendance($attLog, $device->id);
            $webhook = $device->webhook;
            if($webhook){
                if(!empty($webhook->url)){
                    if(env('APP_DEBUG')){
                        \Log::error('send data to webhook '.$webhook->url);
                    }
                    Http::post($webhook->url, ['data' => $attLog]);
                }
            }
        }

        return $count ;
    }

    // saveOperationLog
    private function saveOperationLog($content, $device){        
        $oprLog = extractDataOperationLog($content);
        $count = count($oprLog['data']);
        
        if($count  > 0){            
            $table = $oprLog['key'];
            switch($table){
                case 'USER':
                    $this->saveUser($oprLog['data'], $device->id);
                    break;
                case 'FP':
                    $this->saveTemplateFinger($oprLog['data'], $device->id);
                    break;
                default:
                    \Log::info('---- saveOperationLog ------');
                    \Log::info('---table----'.$table);
                    \Log::info($oprLog['data']);
            }            
        }

        return $count ;
    }
    
    private function saveUser($content, $deviceId){        
        (new UserDeviceRepository())->saveUser($content, $deviceId);
    }

    private function saveTemplateFinger($content, $deviceId){        
        (new TemplateFingerprintDeviceRepository())->saveTemplate($content, $deviceId);
    }    
}
