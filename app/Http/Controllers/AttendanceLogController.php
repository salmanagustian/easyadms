<?php

namespace App\Http\Controllers;

use App\DataTables\AttendanceLogDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAttendanceLogRequest;
use App\Http\Requests\UpdateAttendanceLogRequest;
use App\Repositories\AttendanceLogRepository;
use App\Repositories\DeviceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class AttendanceLogController extends AppBaseController
{
    /** @var  AttendanceLogRepository */
    protected $repository;
    protected $baseRoute = 'attendanceLogs';
    protected $baseView = 'attendance_logs';
    public function __construct()
    {
        $this->repository = AttendanceLogRepository::class;
    }

    /**
     * Display a listing of the AttendanceLog.
     *
     * @param AttendanceLogDataTable $attendanceLogDataTable
     * @return Response
     */
    public function index(AttendanceLogDataTable $attendanceLogDataTable)
    {
        return $attendanceLogDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new AttendanceLog.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseRoute.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created AttendanceLog in storage.
     *
     * @param CreateAttendanceLogRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceLogRequest $request)
    {
        $input = $request->all();

        $attendanceLog = $this->getRepositoryObj()->create($input);
        if($attendanceLog instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $attendanceLog->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/attendanceLogs.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified AttendanceLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attendanceLog = $this->getRepositoryObj()->find($id);

        if (empty($attendanceLog)) {
            Flash::error(__('models/attendanceLogs.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseRoute.'.show')->with('attendanceLog', $attendanceLog);
    }

    /**
     * Show the form for editing the specified AttendanceLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendanceLog = $this->getRepositoryObj()->find($id);

        if (empty($attendanceLog)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attendanceLogs.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseRoute.'.edit')->with('attendanceLog', $attendanceLog)->with($this->getOptionItems());
    }

    /**
     * Update the specified AttendanceLog in storage.
     *
     * @param  int              $id
     * @param UpdateAttendanceLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceLogRequest $request)
    {
        $attendanceLog = $this->getRepositoryObj()->find($id);

        if (empty($attendanceLog)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attendanceLogs.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $attendanceLog = $this->getRepositoryObj()->update($request->all(), $id);
        if($attendanceLog instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $attendanceLog->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/attendanceLogs.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified AttendanceLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendanceLog = $this->getRepositoryObj()->find($id);

        if (empty($attendanceLog)) {
            Flash::error(__('messages.not_found', ['model' => __('models/attendanceLogs.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/attendanceLogs.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model AttendanceLog from storage.         
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
