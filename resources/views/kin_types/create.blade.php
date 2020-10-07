@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Kin types</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['action' => 'Payroll\KinTypeController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => 'Enter Kin name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter Kin description']) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




