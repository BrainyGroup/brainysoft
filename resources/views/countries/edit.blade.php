@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Country</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => array('CountryController@update', $country->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name',$country->name,['placeholder' => 'Enter Ountry name']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}


        </div>
    </div>
</div>
@endsection
