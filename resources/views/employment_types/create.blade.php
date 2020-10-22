@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.add')}} {{__('messages.employment type')}}</div>
                <div class="card-body">

                    {!! Form::open(['action' => 'Payroll\EmploymentTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => __('messages.employment type name'), 'label' => __('messages.name')]) }}                  

                    {{ Form::bsText('description','',['placeholder' => __('messages.employment type description'), 'label' => __('messages.description')]) }}
                   
                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




                   

