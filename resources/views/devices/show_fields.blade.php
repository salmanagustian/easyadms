<!-- Serial Number Field -->
<div class="form-group row mb-3">
    {!! Form::label('serial_number', __('models/devices.fields.serial_number').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->serial_number }}</p>
    </div>
</div>

<!-- Additional Info Field -->
<div class="form-group row mb-3">
    {!! Form::label('additional_info', __('models/devices.fields.additional_info').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->additional_info }}</p>
    </div>
</div>

<!-- Attlog Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('attlog_stamp', __('models/devices.fields.attlog_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->attlog_stamp }}</p>
    </div>
</div>

<!-- Operlog Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('operlog_stamp', __('models/devices.fields.operlog_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->operlog_stamp }}</p>
    </div>
</div>

<!-- Attphotolog Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('attphotolog_stamp', __('models/devices.fields.attphotolog_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->attphotolog_stamp }}</p>
    </div>
</div>

<!-- Error Delay Field -->
<div class="form-group row mb-3">
    {!! Form::label('error_delay', __('models/devices.fields.error_delay').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->error_delay }}</p>
    </div>
</div>

<!-- Delay Field -->
<div class="form-group row mb-3">
    {!! Form::label('delay', __('models/devices.fields.delay').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->delay }}</p>
    </div>
</div>

<!-- Trans Times Field -->
<div class="form-group row mb-3">
    {!! Form::label('trans_times', __('models/devices.fields.trans_times').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->trans_times }}</p>
    </div>
</div>

<!-- Trans Interval Field -->
<div class="form-group row mb-3">
    {!! Form::label('trans_interval', __('models/devices.fields.trans_interval').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->trans_interval }}</p>
    </div>
</div>

<!-- Trans Flag Field -->
<div class="form-group row mb-3">
    {!! Form::label('trans_flag', __('models/devices.fields.trans_flag').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->trans_flag }}</p>
    </div>
</div>

<!-- Timezone Field -->
<div class="form-group row mb-3">
    {!! Form::label('timezone', __('models/devices.fields.timezone').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->timezone }}</p>
    </div>
</div>

<!-- Realtime Field -->
<div class="form-group row mb-3">
    {!! Form::label('realtime', __('models/devices.fields.realtime').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->realtime }}</p>
    </div>
</div>

<!-- Encrypt Field -->
<div class="form-group row mb-3">
    {!! Form::label('encrypt', __('models/devices.fields.encrypt').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->encrypt }}</p>
    </div>
</div>

<!-- Server Version Field -->
<div class="form-group row mb-3">
    {!! Form::label('server_version', __('models/devices.fields.server_version').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->server_version }}</p>
    </div>
</div>

<!-- Table Name Stamp Field -->
<div class="form-group row mb-3">
    {!! Form::label('table_name_stamp', __('models/devices.fields.table_name_stamp').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $device->table_name_stamp }}</p>
    </div>
</div>

