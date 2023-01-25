<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/templateFingerprintDevices.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Pin Field -->
<div class="form-group row mb-3">
    {!! Form::label('pin', __('models/templateFingerprintDevices.fields.pin').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('pin', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30, 'required' => 'required']) !!}
</div>
</div>

<!-- Fid Field -->
<div class="form-group row mb-3">
    {!! Form::label('fid', __('models/templateFingerprintDevices.fields.fid').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('fid', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Size Field -->
<div class="form-group row mb-3">
    {!! Form::label('size', __('models/templateFingerprintDevices.fields.size').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::number('size', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
</div>

<!-- Valid Field -->
<div class="form-group row mb-3">
    {!! Form::label('valid', __('models/templateFingerprintDevices.fields.valid').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('valid', 0) !!}
        {!! Form::checkbox('valid', '1', null) !!}
    </label>
</div>
</div>


<!-- Tmp Field -->
<div class="form-group row mb-3">
    {!! Form::label('tmp', __('models/templateFingerprintDevices.fields.tmp').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::textarea('tmp', null, ['class' => 'form-control', 'rows' => 4, 'required' => 'required']) !!}
</div>
</div>
