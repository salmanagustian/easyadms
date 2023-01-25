<!-- Device Id Field -->
<div class="form-group row mb-3">
    {!! Form::label('device_id', __('models/commands.fields.device_id').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $command->device_id }}</p>
    </div>
</div>

<!-- Command Field -->
<div class="form-group row mb-3">
    {!! Form::label('command', __('models/commands.fields.command').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $command->command }}</p>
    </div>
</div>

<!-- Status Field -->
<div class="form-group row mb-3">
    {!! Form::label('status', __('models/commands.fields.status').':', ['class' => 'col-md-3 col-form-label']) !!}
    <div class="col-md-9">
        <p>{{ $command->status }}</p>
    </div>
</div>

