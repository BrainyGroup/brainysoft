<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::file($name, array_merge(['class' => 'custom-file-input class'], $attributes)) }}
</div>
