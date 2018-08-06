@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Center</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'CenterController@store','method' => 'POST']) !!}

                    {{ Form::bsText('number','',['placeholder' => 'Enter Center number']) }}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Bank name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter Bank description']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
