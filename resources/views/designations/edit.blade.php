@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.designation')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => array('Payroll\DesignationController@update', $designation->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $designation->name,['placeholder' => __('messages.designation name'), 'label' => __('messages.name')]) }}

                    {{ Form::bsText('description', $designation->description,['placeholder' => __('messages.designation description'), 'label' => __('messages.description')]) }}

                    {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




