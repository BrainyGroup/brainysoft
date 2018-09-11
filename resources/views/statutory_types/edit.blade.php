@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Statutory types </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                      {!! Form::open(['action' => array('StatutoryTypeController@update', $statutory_type->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $statutory_type->name,['placeholder' => 'Enter Kin name']) }}

                    {{ Form::bsText('description',$statutory_type->description,['placeholder' => 'Enter Kin description']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
