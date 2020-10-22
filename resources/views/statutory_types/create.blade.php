@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.statutory type')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\StatutoryTypeController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => __('messages.statutory type name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.statutory type description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}


        </div>
    </div>
</div>    
@endsection






