<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/webhooks.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Url Field -->
<div class="form-group row mb-3">
    {!! Form::label('url', __('models/webhooks.fields.url').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('url', null, ['class' => 'form-control inputmask','maxlength' => 255, 'required' => 'required', 'data-optionmask' => json_encode(config('local.textmask.url'))]) !!}
</div>
</div>
