@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Salary scale </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => array('ScaleController@update', $scale->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $scale->name,['placeholder' => 'Enter scale name']) }}

                    {{ Form::bsText('description', $scale->description,['placeholder' => 'Enter scale description']) }}

                    {{ Form::bsText('minimum', $scale->minimum,['placeholder' => 'Enter minimum salary']) }}

                    {{ Form::bsText('maximum', $scale->maximum,['placeholder' => 'Enter maximum salary']) }}

                    {{ Form::bsText('schedule',$scale->schedule,['placeholder' => 'Enter salary circle']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
