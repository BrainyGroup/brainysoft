@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Kin types</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => array('KinTypeController@update', $kin_type->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $kin_type->name,['placeholder' => 'Enter Kin name']) }}

                    {{ Form::bsText('description', $kin_type->description,['placeholder' => 'Enter Kin description']) }}

                    {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
