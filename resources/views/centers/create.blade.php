@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' '.__('messages.center')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\CenterController@store','method' => 'POST']) !!}

            {{ Form::bsText('number','',['placeholder' => __('messages.enter number'), 'label' => __('messages.number')]) }}

            {{ Form::bsText('name','',['placeholder' => __('messages.enter name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.enter description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection


