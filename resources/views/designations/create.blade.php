@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Designation</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'DesignationController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Deduction name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter Deduction description']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
