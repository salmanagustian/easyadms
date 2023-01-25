<?php

namespace App\Http\Controllers;

use App\DataTables\DeviceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Repositories\DeviceRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class DeviceController extends AppBaseController
{
    /** @var  DeviceRepository */
    protected $repository;
    protected $baseRoute = 'devices';
    protected $baseView = 'devices';
    public function __construct()
    {
        $this->repository = DeviceRepository::class;
    }

    /**
     * Display a listing of the Device.
     *
     * @param DeviceDataTable $deviceDataTable
     * @return Response
     */
    public function index(DeviceDataTable $deviceDataTable)
    {
        return $deviceDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new Device.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Device in storage.
     *
     * @param CreateDeviceRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceRequest $request)
    {
        $input = $request->all();

        $device = $this->getRepositoryObj()->create($input);
        if($device instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $device->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/devices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified Device.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $device = $this->getRepositoryObj()->find($id);

        if (empty($device)) {
            Flash::error(__('models/devices.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('device', $device);
    }

    /**
     * Show the form for editing the specified Device.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $device = $this->getRepositoryObj()->find($id);

        if (empty($device)) {
            Flash::error(__('messages.not_found', ['model' => __('models/devices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseRoute.'.edit')->with('device', $device)->with($this->getOptionItems());
    }

    /**
     * Update the specified Device in storage.
     *
     * @param  int              $id
     * @param UpdateDeviceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceRequest $request)
    {
        $device = $this->getRepositoryObj()->find($id);

        if (empty($device)) {
            Flash::error(__('messages.not_found', ['model' => __('models/devices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $device = $this->getRepositoryObj()->update($request->all(), $id);
        if($device instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $device->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/devices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified Device from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $device = $this->getRepositoryObj()->find($id);

        if (empty($device)) {
            Flash::error(__('messages.not_found', ['model' => __('models/devices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/devices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model Device from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
            'baseRoute' => $this->baseRoute,
            'baseView' => $this->baseView,
                        
        ];
    }
}
