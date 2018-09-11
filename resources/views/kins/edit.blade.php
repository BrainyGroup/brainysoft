@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Kin</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => array('KinController@update', $kin->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $kin->name,['placeholder' => 'Enter Kin name']) }}

                    {{ Form::bsText('description', $kin->description ,['placeholder' => 'Enter Kin description']) }}

                    {{ Form::bsSubmit( __('messages.kin'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
