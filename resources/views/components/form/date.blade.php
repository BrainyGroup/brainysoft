<div class="form-group">
    {{ Form::label($name, '', ['class' => 'control-label']) }}
    {{ Form::date($name, \Carbon\Carbon::now(), array_merge(['class' => 'form-control'], $attributes)) }}
</div>
