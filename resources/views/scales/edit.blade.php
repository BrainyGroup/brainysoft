@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.scale')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['action' => array('Payroll\ScaleController@update', $scale->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $scale->name,['placeholder' => __('messages.scale name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description', $scale->description,['placeholder' => __('messages.scale description'), 'label' => __('messages.description')]) }}

            {{ Form::bsText('minimum', $scale->minimum,['placeholder' => __('messages.minimum salary'), 'label' => __('messages.minimum salary')]) }}

            {{ Form::bsText('maximum', $scale->maximum,['placeholder' => __('messages.maximum salary'), 'label' => __('messages.maximum salary')]) }}

            {{ Form::bsText('schedule',$scale->schedule,['placeholder' => __('messages.scale schedule'), 'label' => __('messages.scale schedule')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







