@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add allowance type</div>
                <div class="card-body">

                    {!! Form::open(['action' => 'Payroll\AllowanceTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Allowance name']) }}                  

                    {{ Form::bsText('description','',['placeholder' => 'Enter Allowance description']) }}
                   
                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




                   

