<?php

namespace App\Http\Controllers;

use App\DataTables\WebhookDataTable;
use App\Http\Requests\CreateWebhookRequest;
use App\Http\Requests\UpdateWebhookRequest;
use App\Repositories\WebhookRepository;
use App\Repositories\DeviceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Device;
use Response;
use Exception;

class WebhookController extends AppBaseController
{
    /** @var  WebhookRepository */
    protected $repository;
    protected $baseRoute = 'webhooks';
    protected $baseView = 'webhooks';
    public function __construct()
    {
        $this->repository = WebhookRepository::class;
    }

    /**
     * Display a listing of the Webhook.
     *
     * @param WebhookDataTable $webhookDataTable
     * @return Response
     */
    public function index(WebhookDataTable $webhookDataTable)
    {
        return $webhookDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new Webhook.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Webhook in storage.
     *
     * @param CreateWebhookRequest $request
     *
     * @return Response
     */
    public function store(CreateWebhookRequest $request)
    {
        $input = $request->all();

        $webhook = $this->getRepositoryObj()->create($input);
        if($webhook instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $webhook->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/webhooks.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified Webhook.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $webhook = $this->getRepositoryObj()->find($id);

        if (empty($webhook)) {
            Flash::error(__('models/webhooks.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('webhook', $webhook);
    }

    /**
     * Show the form for editing the specified Webhook.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $webhook = $this->getRepositoryObj()->find($id);

        if (empty($webhook)) {
            Flash::error(__('messages.not_found', ['model' => __('models/webhooks.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        $optionItems = $this->getOptionItems();
        $optionItems['deviceItems'] = Device::find($webhook->device_id)->pluck('name', 'id')->toArray();         
        return view($this->baseRoute.'.edit')->with('webhook', $webhook)->with($optionItems);
    }

    /**
     * Update the specified Webhook in storage.
     *
     * @param  int              $id
     * @param UpdateWebhookRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebhookRequest $request)
    {
        $webhook = $this->getRepositoryObj()->find($id);

        if (empty($webhook)) {
            Flash::error(__('messages.not_found', ['model' => __('models/webhooks.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $webhook = $this->getRepositoryObj()->update($request->all(), $id);
        if($webhook instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $webhook->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/webhooks.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified Webhook from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $webhook = $this->getRepositoryObj()->find($id);

        if (empty($webhook)) {
            Flash::error(__('messages.not_found', ['model' => __('models/webhooks.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/webhooks.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model Webhook from storage.         
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
            'deviceItems' => ['' => __('crud.option.device_placeholder')] + $device->deviceWebhook()
        ];
    }
}
