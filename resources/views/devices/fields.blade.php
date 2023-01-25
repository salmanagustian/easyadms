<!-- Serial Number Field -->
<div class="form-group row mb-3">
    {!! Form::label('serial_number', __('models/devices.fields.serial_number').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('serial_number', null, ['class' => 'form-control','maxlength' => 40,'maxlength' => 40, 'required' => 'required']) !!}
</div>
</div>

<!-- Additional Info Field -->
<div class="form-group row mb-3">
    {!! Form::label('additional_info', __('models/devices.fields.additional_info').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('additional_info', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Attlog Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('attlog_stamp', __('models/devices.fields.attlog_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('attlog_stamp', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Operlog Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('operlog_stamp', __('models/devices.fields.operlog_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('operlog_stamp', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Attphotolog Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('attphotolog_stamp', __('models/devices.fields.attphotolog_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('attphotolog_stamp', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Error Delay Field -->
<div class="form-group row mb-3">
    {!! Form::label('error_delay', __('models/devices.fields.error_delay').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('error_delay', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Delay Field -->
<div class="form-group row mb-3">
    {!! Form::label('delay', __('models/devices.fields.delay').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('delay', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Trans Times Field -->
<div class="form-group row mb-3">
    {!! Form::label('trans_times', __('models/devices.fields.trans_times').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('trans_times', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Trans Interval Field -->
<div class="form-group row mb-3">
    {!! Form::label('trans_interval', __('models/devices.fields.trans_interval').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('trans_interval', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Trans Flag Field -->
<div class="form-group row mb-3">
    {!! Form::label('trans_flag', __('models/devices.fields.trans_flag').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('trans_flag', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Timezone Field -->
<div class="form-group row mb-3">
    {!! Form::label('timezone', __('models/devices.fields.timezone').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('timezone', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Realtime Field -->
<div class="form-group row mb-3">
    {!! Form::label('realtime', __('models/devices.fields.realtime').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('realtime', 0) !!}
        {!! Form::checkbox('realtime', '1', null) !!}
    </label>
</div>
</div>


<!-- Encrypt Field -->
<div class="form-group row mb-3">
    {!! Form::label('encrypt', __('models/devices.fields.encrypt').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('encrypt', 0) !!}
        {!! Form::checkbox('encrypt', '1', null) !!}
    </label>
</div>
</div>


<!-- Server Version Field -->
<div class="form-group row mb-3">
    {!! Form::label('server_version', __('models/devices.fields.server_version').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('server_version', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Table Name Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('table_name_stamp', __('models/devices.fields.table_name_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('table_name_stamp', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>
