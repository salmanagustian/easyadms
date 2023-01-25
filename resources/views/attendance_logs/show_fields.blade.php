<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/attendanceLogs.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->device_id }}</p>
    </div>
</div>

<!-- Pin Field -->
<div class="form-group row mb-3">
    {!! Form::label('pin', __('models/attendanceLogs.fields.pin').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->pin }}</p>
    </div>
</div>

<!-- Fingertime Field -->
<div class="form-group row mb-3">
    {!! Form::label('fingertime', __('models/attendanceLogs.fields.fingertime').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->fingertime }}</p>
    </div>
</div>

<!-- Status Field -->
<div class="form-group row mb-3">
    {!! Form::label('status', __('models/attendanceLogs.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->status }}</p>
    </div>
</div>

<!-- Verify Field -->
<div class="form-group row mb-3">
    {!! Form::label('verify', __('models/attendanceLogs.fields.verify').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->verify }}</p>
    </div>
</div>

<!-- Work Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_code', __('models/attendanceLogs.fields.work_code').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->work_code }}</p>
    </div>
</div>

<!-- Reserved Field -->
<div class="form-group row mb-3">
    {!! Form::label('reserved', __('models/attendanceLogs.fields.reserved').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $attendanceLog->reserved }}</p>
    </div>
</div>

