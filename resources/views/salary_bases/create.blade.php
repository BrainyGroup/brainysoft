@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.salary base')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['action' => 'Payroll\SalaryBaseController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => __('messages.salary base name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.salary base description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection






