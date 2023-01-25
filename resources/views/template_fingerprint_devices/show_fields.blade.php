<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/templateFingerprintDevices.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $templateFingerprintDevice->device_id }}</p>
    </div>
</div>

<!-- Pin Field -->
<div class="form-group row mb-3">
    {!! Form::label('pin', __('models/templateFingerprintDevices.fields.pin').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $templateFingerprintDevice->pin }}</p>
    </div>
</div>

<!-- Fid Field -->
<div class="form-group row mb-3">
    {!! Form::label('fid', __('models/templateFingerprintDevices.fields.fid').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $templateFingerprintDevice->fid }}</p>
    </div>
</div>

<!-- Size Field -->
<div class="form-group row mb-3">
    {!! Form::label('size', __('models/templateFingerprintDevices.fields.size').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $templateFingerprintDevice->size }}</p>
    </div>
</div>

<!-- Valid Field -->
<div class="form-group row mb-3">
    {!! Form::label('valid', __('models/templateFingerprintDevices.fields.valid').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $templateFingerprintDevice->valid }}</p>
    </div>
</div>

<!-- Tmp Field -->
<div class="form-group row mb-3">
    {!! Form::label('tmp', __('models/templateFingerprintDevices.fields.tmp').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $templateFingerprintDevice->tmp }}</p>
    </div>
</div>

