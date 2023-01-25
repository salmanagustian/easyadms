<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/userDevices.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Pin Field -->
<div class="form-group row mb-3">
    {!! Form::label('pin', __('models/userDevices.fields.pin').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('pin', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30, 'required' => 'required']) !!}
</div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/userDevices.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Pri Field -->
<div class="form-group row mb-3">
    {!! Form::label('pri', __('models/userDevices.fields.pri').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('pri', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Passwd Field -->
<div class="form-group row mb-3">
    {!! Form::label('passwd', __('models/userDevices.fields.passwd').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('passwd', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Card Field -->
<div class="form-group row mb-3">
    {!! Form::label('card', __('models/userDevices.fields.card').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('card', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Grp Field -->
<div class="form-group row mb-3">
    {!! Form::label('grp', __('models/userDevices.fields.grp').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('grp', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10, 'required' => 'required']) !!}
</div>
</div>

<!-- Tz Field -->
<div class="form-group row mb-3">
    {!! Form::label('tz', __('models/userDevices.fields.tz').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('tz', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Verify Field -->
<div class="form-group row mb-3">
    {!! Form::label('verify', __('models/userDevices.fields.verify').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('verify', 0) !!}
        {!! Form::checkbox('verify', '1', null) !!}
    </label>
</div>
</div>


<!-- Vice Card Field -->
<div class="form-group row mb-3">
    {!! Form::label('vice_card', __('models/userDevices.fields.vice_card').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('vice_card', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Start Datetime Field -->
<div class="form-group row mb-3">
    {!! Form::label('start_datetime', __('models/userDevices.fields.start_datetime').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('start_datetime', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'start_datetime']) !!}
</div>
</div>

<!-- End Datetime Field -->
<div class="form-group row mb-3">
    {!! Form::label('end_datetime', __('models/userDevices.fields.end_datetime').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('end_datetime', null, ['class' => 'form-control datetime', 'required' => 'required' ,'data-optiondate' => json_encode( ['locale' => ['format' => config('local.date_format_javascript') ]]),'id'=>'end_datetime']) !!}
</div>
</div>
