@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Salary scale </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'ScaleController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter scale name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter scale description']) }}

                    {{ Form::bsText('minimum','',['placeholder' => 'Enter minimum salary']) }}

                    {{ Form::bsText('maximum','',['placeholder' => 'Enter maximum salary']) }}

                    {{ Form::bsText('schedule','',['placeholder' => 'Enter salary circle']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
