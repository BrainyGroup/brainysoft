@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.statutory type')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


           {!! Form::open(['action' => array('Payroll\StatutoryTypeController@update', $statutory_type->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $statutory_type->name,['placeholder' => __('messages.statutory type name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description',$statutory_type->description,['placeholder' => __('messages.statutory type description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection





