@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Salary Base</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['action' => 'SalaryBaseController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => 'Enter salary name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter salary description']) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection






