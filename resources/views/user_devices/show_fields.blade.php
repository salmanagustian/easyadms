<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/userDevices.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->device_id }}</p>
    </div>
</div>

<!-- Pin Field -->
<div class="form-group row mb-3">
    {!! Form::label('pin', __('models/userDevices.fields.pin').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->pin }}</p>
    </div>
</div>

<!-- Name Field -->
<div class="form-group row mb-3">
    {!! Form::label('name', __('models/userDevices.fields.name').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->name }}</p>
    </div>
</div>

<!-- Pri Field -->
<div class="form-group row mb-3">
    {!! Form::label('pri', __('models/userDevices.fields.pri').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->pri }}</p>
    </div>
</div>

<!-- Passwd Field -->
<div class="form-group row mb-3">
    {!! Form::label('passwd', __('models/userDevices.fields.passwd').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->passwd }}</p>
    </div>
</div>

<!-- Card Field -->
<div class="form-group row mb-3">
    {!! Form::label('card', __('models/userDevices.fields.card').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->card }}</p>
    </div>
</div>

<!-- Grp Field -->
<div class="form-group row mb-3">
    {!! Form::label('grp', __('models/userDevices.fields.grp').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->grp }}</p>
    </div>
</div>

<!-- Tz Field -->
<div class="form-group row mb-3">
    {!! Form::label('tz', __('models/userDevices.fields.tz').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->tz }}</p>
    </div>
</div>

<!-- Verify Field -->
<div class="form-group row mb-3">
    {!! Form::label('verify', __('models/userDevices.fields.verify').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->verify }}</p>
    </div>
</div>

<!-- Vice Card Field -->
<div class="form-group row mb-3">
    {!! Form::label('vice_card', __('models/userDevices.fields.vice_card').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->vice_card }}</p>
    </div>
</div>

<!-- Start Datetime Field -->
<div class="form-group row mb-3">
    {!! Form::label('start_datetime', __('models/userDevices.fields.start_datetime').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->start_datetime }}</p>
    </div>
</div>

<!-- End Datetime Field -->
<div class="form-group row mb-3">
    {!! Form::label('end_datetime', __('models/userDevices.fields.end_datetime').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $userDevice->end_datetime }}</p>
    </div>
</div>

