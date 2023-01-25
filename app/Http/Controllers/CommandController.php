<?php

namespace App\Http\Controllers;

use App\DataTables\CommandDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCommandRequest;
use App\Http\Requests\UpdateCommandRequest;
use App\Repositories\CommandRepository;
use App\Repositories\DeviceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class CommandController extends AppBaseController
{
    /** @var  CommandRepository */
    protected $repository;
    protected $baseRoute = 'commands';
    protected $baseView = 'commands';
    public function __construct()
    {
        $this->repository = CommandRepository::class;
    }

    /**
     * Display a listing of the Command.
     *
     * @param CommandDataTable $commandDataTable
     * @return Response
     */
    public function index(CommandDataTable $commandDataTable)
    {
        return $commandDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new Command.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Command in storage.
     *
     * @param CreateCommandRequest $request
     *
     * @return Response
     */
    public function store(CreateCommandRequest $request)
    {
        $input = $request->all();

        $command = $this->getRepositoryObj()->create($input);
        if($command instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $command->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/commands.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified Command.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $command = $this->getRepositoryObj()->find($id);

        if (empty($command)) {
            Flash::error(__('models/commands.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('command', $command);
    }

    /**
     * Show the form for editing the specified Command.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $command = $this->getRepositoryObj()->find($id);

        if (empty($command)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commands.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseRoute.'.edit')->with('command', $command)->with($this->getOptionItems());
    }

    /**
     * Update the specified Command in storage.
     *
     * @param  int              $id
     * @param UpdateCommandRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommandRequest $request)
    {
        $command = $this->getRepositoryObj()->find($id);

        if (empty($command)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commands.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $command = $this->getRepositoryObj()->update($request->all(), $id);
        if($command instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $command->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/commands.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified Command from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $command = $this->getRepositoryObj()->find($id);

        if (empty($command)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commands.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/commands.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model Command from storage.         
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
