@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Employment type</div>
                <div class="card-body">

                    {!! Form::open(['action' => 'Payroll\EmploymentTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Employment type name']) }}                  

                    {{ Form::bsText('description','',['placeholder' => 'Enter Employment type description']) }}
                   
                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




                   

