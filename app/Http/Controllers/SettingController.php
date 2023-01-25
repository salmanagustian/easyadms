<?php

namespace App\Http\Controllers;

use App\DataTables\SettingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\SettingRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class SettingController extends AppBaseController
{
    /** @var  SettingRepository */
    protected $repository;
    protected $baseRoute = 'settings';
    protected $baseView = 'settings';
    public function __construct()
    {
        $this->repository = SettingRepository::class;
    }

    /**
     * Display a listing of the Setting.
     *
     * @param SettingDataTable $settingDataTable
     * @return Response
     */
    public function index(SettingDataTable $settingDataTable)
    {
        return $settingDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param CreateSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();

        $setting = $this->getRepositoryObj()->create($input);
        if($setting instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $setting->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/settings.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified Setting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setting = $this->getRepositoryObj()->find($id);

        if (empty($setting)) {
            Flash::error(__('models/settings.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setting = $this->getRepositoryObj()->find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseRoute.'.edit')->with('setting', $setting)->with($this->getOptionItems());
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param  int              $id
     * @param UpdateSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {
        $setting = $this->getRepositoryObj()->find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $setting = $this->getRepositoryObj()->update($request->all(), $id);
        if($setting instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $setting->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/settings.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $setting = $this->getRepositoryObj()->find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/settings.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model Setting from storage.         
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
