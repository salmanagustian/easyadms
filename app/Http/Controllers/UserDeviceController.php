<?php

namespace App\Http\Controllers;

use App\DataTables\UserDeviceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserDeviceRequest;
use App\Http\Requests\UpdateUserDeviceRequest;
use App\Repositories\UserDeviceRepository;
use App\Repositories\DeviceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class UserDeviceController extends AppBaseController
{
    /** @var  UserDeviceRepository */
    protected $repository;
    protected $baseRoute = 'userDevices';
    protected $baseView = 'user_devices';
    public function __construct()
    {
        $this->repository = UserDeviceRepository::class;
    }

    /**
     * Display a listing of the UserDevice.
     *
     * @param UserDeviceDataTable $userDeviceDataTable
     * @return Response
     */
    public function index(UserDeviceDataTable $userDeviceDataTable)
    {
        return $userDeviceDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new UserDevice.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created UserDevice in storage.
     *
     * @param CreateUserDeviceRequest $request
     *
     * @return Response
     */
    public function store(CreateUserDeviceRequest $request)
    {
        $input = $request->all();

        $userDevice = $this->getRepositoryObj()->create($input);
        if($userDevice instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $userDevice->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/userDevices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified UserDevice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userDevice = $this->getRepositoryObj()->find($id);

        if (empty($userDevice)) {
            Flash::error(__('models/userDevices.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('userDevice', $userDevice);
    }

    /**
     * Show the form for editing the specified UserDevice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userDevice = $this->getRepositoryObj()->find($id);

        if (empty($userDevice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userDevices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseRoute.'.edit')->with('userDevice', $userDevice)->with($this->getOptionItems());
    }

    /**
     * Update the specified UserDevice in storage.
     *
     * @param  int              $id
     * @param UpdateUserDeviceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserDeviceRequest $request)
    {
        $userDevice = $this->getRepositoryObj()->find($id);

        if (empty($userDevice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userDevices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $userDevice = $this->getRepositoryObj()->update($request->all(), $id);
        if($userDevice instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $userDevice->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/userDevices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified UserDevice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userDevice = $this->getRepositoryObj()->find($id);

        if (empty($userDevice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/userDevices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/userDevices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model UserDevice from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $device = new DeviceRepository(app());
        return [
            'baseRoute' => $this->baseRoute,
            'baseView' => $this->baseView,
            'deviceItems' => ['' => __('crud.option.device_placeholder')] + $device->pluck()            
        ];
    }
}
