<div class="form-group">
    {{-- {{ Form::label(trans($name), null, ['class' => 'control-label']) }} --}}
    {{ Form::label($name, $attributes['label'] ?? null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
