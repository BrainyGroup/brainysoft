@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Departement</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'DepartmentController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => 'Enter Deduction name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter Deduction description']) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection




