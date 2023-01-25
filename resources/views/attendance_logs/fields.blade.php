<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/attendanceLogs.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Pin Field -->
<div class="form-group row mb-3">
    {!! Form::label('pin', __('models/attendanceLogs.fields.pin').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('pin', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30, 'required' => 'required']) !!}
</div>
</div>

<!-- Fingertime Field -->
<div class="form-group row mb-3">
    {!! Form::label('fingertime', __('models/attendanceLogs.fields.fingertime').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('fingertime', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'fingertime']) !!}
</div>
</div>

<!-- Status Field -->
<div class="form-group row mb-3">
    {!! Form::label('status', __('models/attendanceLogs.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>
</div>


<!-- Verify Field -->
<div class="form-group row mb-3">
    {!! Form::label('verify', __('models/attendanceLogs.fields.verify').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('verify', 0) !!}
        {!! Form::checkbox('verify', '1', null) !!}
    </label>
</div>
</div>


<!-- Work Code Field -->
<div class="form-group row mb-3">
    {!! Form::label('work_code', __('models/attendanceLogs.fields.work_code').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('work_code', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Reserved Field -->
<div class="form-group row mb-3">
    {!! Form::label('reserved', __('models/attendanceLogs.fields.reserved').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('reserved', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>
