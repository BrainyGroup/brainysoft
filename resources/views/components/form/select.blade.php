<div class="form-group">
    <!-- {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::select($name, $attributes , $value,array_merge(['class' => 'form-control'])) }} -->

    {!! Form::label($name, null , ['class' => 'control-label']) !!}
    {!! Form::select($name, $value , $selected, ['class' => 'form-control']) !!}
</div>
