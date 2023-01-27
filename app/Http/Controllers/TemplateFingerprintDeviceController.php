<?php

namespace App\Http\Controllers;

use App\DataTables\TemplateFingerprintDeviceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTemplateFingerprintDeviceRequest;
use App\Http\Requests\UpdateTemplateFingerprintDeviceRequest;
use App\Repositories\TemplateFingerprintDeviceRepository;
use App\Repositories\DeviceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class TemplateFingerprintDeviceController extends AppBaseController
{
    /** @var  TemplateFingerprintDeviceRepository */
    protected $repository;
    protected $baseRoute = 'templateFingerprintDevices';
    protected $baseView = 'template_fingerprint_devices';
    public function __construct()
    {
        $this->repository = TemplateFingerprintDeviceRepository::class;
    }

    /**
     * Display a listing of the TemplateFingerprintDevice.
     *
     * @param TemplateFingerprintDeviceDataTable $templateFingerprintDeviceDataTable
     * @return Response
     */
    public function index(TemplateFingerprintDeviceDataTable $templateFingerprintDeviceDataTable)
    {
        return $templateFingerprintDeviceDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new TemplateFingerprintDevice.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created TemplateFingerprintDevice in storage.
     *
     * @param CreateTemplateFingerprintDeviceRequest $request
     *
     * @return Response
     */
    public function store(CreateTemplateFingerprintDeviceRequest $request)
    {
        $input = $request->all();

        $templateFingerprintDevice = $this->getRepositoryObj()->create($input);
        if($templateFingerprintDevice instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $templateFingerprintDevice->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/templateFingerprintDevices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified TemplateFingerprintDevice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $templateFingerprintDevice = $this->getRepositoryObj()->find($id);

        if (empty($templateFingerprintDevice)) {
            Flash::error(__('models/templateFingerprintDevices.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('templateFingerprintDevice', $templateFingerprintDevice);
    }

    /**
     * Show the form for editing the specified TemplateFingerprintDevice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $templateFingerprintDevice = $this->getRepositoryObj()->find($id);

        if (empty($templateFingerprintDevice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/templateFingerprintDevices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseRoute.'.edit')->with('templateFingerprintDevice', $templateFingerprintDevice)->with($this->getOptionItems());
    }

    /**
     * Update the specified TemplateFingerprintDevice in storage.
     *
     * @param  int              $id
     * @param UpdateTemplateFingerprintDeviceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTemplateFingerprintDeviceRequest $request)
    {
        $templateFingerprintDevice = $this->getRepositoryObj()->find($id);

        if (empty($templateFingerprintDevice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/templateFingerprintDevices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $templateFingerprintDevice = $this->getRepositoryObj()->update($request->all(), $id);
        if($templateFingerprintDevice instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $templateFingerprintDevice->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/templateFingerprintDevices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified TemplateFingerprintDevice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $templateFingerprintDevice = $this->getRepositoryObj()->find($id);

        if (empty($templateFingerprintDevice)) {
            Flash::error(__('messages.not_found', ['model' => __('models/templateFingerprintDevices.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/templateFingerprintDevices.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model TemplateFingerprintDevice from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $device = new DeviceRepository();
        return [
            'baseRoute' => $this->baseRoute,
            'baseView' => $this->baseView,
            'deviceItems' => ['' => __('crud.option.device_placeholder')] + $device->pluck()            
        ];
    }
}
