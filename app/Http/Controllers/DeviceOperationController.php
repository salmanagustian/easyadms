<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Repositories\CommandRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class DeviceOperationController extends Controller
{
    public function index(Device $device){
        return view('devices.operation', ['device' => $device]);
    }

    /**
     * Store a newly created Command in storage.
     *
     * @param CreateCommandRequest $request
     *
     * @return Response
     */
    public function store(Request $request, Device $device)
    {
        $input = $request->all();
        $input['device_id'] = $device->id;
        if($input['command'] == 'QUERY'){
            $input['command'] = 'DATA QUERY ATTLOG StartTime='.$input['startTime'].' EndTime='.$input['endTime'];
        }
        $input['expired_date'] = Carbon::now()->addHour();
        $repository = new CommandRepository();
        $command = $repository->create($input);
        if($command instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $command->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/commands.singular')]));

        return view('devices.operation', ['device' => $device]);
    }
}
