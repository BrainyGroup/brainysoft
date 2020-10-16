@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.edit').' '.__('messages.center')}}</div>

        <div class="card-body">

            {!! Form::open(['action' => array('Payroll\CenterController@update', $center->id),'method' => 'PUT']) !!}

            {{ Form::bsText(__('messages.number'),$center->number,['placeholder' => __('messages.enter number')]) }}

            {{ Form::bsText(__('messages.name'),$center->name,['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText(__('messages.description'),$center->description,['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


