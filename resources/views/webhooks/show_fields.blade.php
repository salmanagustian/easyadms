<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/webhooks.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $webhook->device_id }}</p>
    </div>
</div>

<!-- Url Field -->
<div class="form-group row mb-3">
    {!! Form::label('url', __('models/webhooks.fields.url').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $webhook->url }}</p>
    </div>
</div>

