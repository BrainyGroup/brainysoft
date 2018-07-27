@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Create Employee</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'EmployeeController@store','method' => 'POST']) !!}

                    {{ Form::bsText('first_name','',['placeholder' => 'Enter First Name']) }}

                    {{ Form::bsEmail('email') }}


                    {{ Form::bsFile('Choose file') }}

                    {{ Form::bsDate('birth_date') }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}



                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
