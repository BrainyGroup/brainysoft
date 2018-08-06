@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Statutory types </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'StatutoryTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Kin name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter Kin description']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
