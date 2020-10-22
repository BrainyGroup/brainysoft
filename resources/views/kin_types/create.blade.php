@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.kin type')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['action' => 'Payroll\KinTypeController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => __('messages.kin type name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.kin type description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




