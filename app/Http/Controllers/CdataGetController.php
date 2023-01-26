<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CdataGetController extends Controller
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
        $device = Device::firstOrCreate(['serial_number' => $sn]);
        $lastStamp = $device->attlog_stamp;
        $timezone = $device->timezone ?? 7;
        $pushver = $request->get('pushver');
        $device->server_version = $pushver;
        $transInterval = $device->trans_interval ?? 1;
        $transTimes = $device->trans_times ?? '00:00;14:05';
        $operStamp = $device->operlog_stamp;
        $attPhotoStamp = $device->attphotolog_stamp;
        $errorDelay = $device->error_delay ?? 30;
        $delay = $device->delay ?? 30;
        $transFlag = $device->transFlag ?? '1111111100';
        $realtime = $device->realtime ?? '1';
        $encrypt = $device->encrypt ?? 0;        
        $device->save();

        $textResponse = <<<STR
GET OPTION FROM: {$sn}
ATTLOGStamp={$lastStamp}
OPERLOGStamp={$operStamp}
ATTPHOTOStamp={$attPhotoStamp}
ErrorDelay={$errorDelay}
Delay={$delay}
TransTimes={$transTimes}
TransInterval={$transInterval}
TransFlag={$transFlag}
TimeZone={$timezone}
Realtime={$realtime}
Encrypt={$encrypt}
ServerVer={$pushver}
TableNameStamp
STR;
        return response($textResponse, 200)
        ->header('Content-Type', 'text/plain')
        ->header('Content-length', strlen($textResponse));
    }

    public function getRequest(Request $request)
    {   
        $sn = $request->get('SN');        
        $info = $request->get('INFO');
        $commandString = 'OK';
        if($info){
            $this->updateInfoDevice($sn, $info);
        }else{
            $device = Device::firstOrCreate(['serial_number' => $sn]);
            $command = Command::where(['device_id' => $device->id, 'status' => 1])->orderBy('id')->first();
            if($command){
                $commandString = 'C:'.$command->id.':'.$command->command;
            }
        }
        // $command = C:{{CmdId}}:DATA<spasi>QUERY<spasi>ATTLOG<spasi>StartTime{{StartTime}}<tab>EndTime={{EndTime}}        
        // Format start & end time YYYY-MM-DD HH:MM:SS
        // C:22:DATA QUERY ATTLOG StartTime2023-01-21 00:00:00  EndTime=2023-01-21 23:59:59
        $textResponse = <<<STR
{$commandString}
STR;
        return response($textResponse, 200)
        ->header('Content-Type', 'text/plain')
        ->header('Content-length', strlen($textResponse));
    }

    private function updateInfoDevice($sn, $info){
        $device = Device::firstOrCreate(['serial_number' => $sn]);
        if($device->additional_info != $info){
            $device->additional_info = $info;
            $device->save();
        }        
    }    
}
