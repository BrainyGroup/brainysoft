@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.department')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\DepartmentController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => __('messages.department name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.department description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection




