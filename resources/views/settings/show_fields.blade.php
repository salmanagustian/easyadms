<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/settings.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $setting->name }}</p>
    </div>
</div>

<!-- Value Field -->
<div class="form-group row mb-3">
    {!! Form::label('value', __('models/settings.fields.value').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $setting->value }}</p>
    </div>
</div>

