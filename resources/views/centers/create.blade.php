@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' '.__('messages.center')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'CenterController@store','method' => 'POST']) !!}

            {{ Form::bsText(__('messages.number'),'',['placeholder' => __('messages.enter number')]) }}

            {{ Form::bsText(__('messages.name'),'',['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText(__('messages.description'),'',['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection


