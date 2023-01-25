<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/commands.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::select('device_id', $deviceItems, null, ['class' => 'form-control select2', 'required' => 'required']) !!}
</div>
</div>

<!-- Command Field -->
<div class="form-group row mb-3">
    {!! Form::label('command', __('models/commands.fields.command').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    {!! Form::text('command', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required' => 'required']) !!}
</div>
</div>

<!-- Status Field -->
<div class="form-group row mb-3">
    {!! Form::label('status', __('models/commands.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
<div class="col-md-9"> 
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>
</div>

