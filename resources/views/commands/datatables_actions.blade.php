{!! Form::open(['route' => [$baseRoute.'.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>    
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
