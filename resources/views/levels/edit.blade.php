@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Company Structure Levels </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                      {!! Form::open(['action' => array('LevelController@update', $level->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name',$level->name,['placeholder' => 'Enter Kin name']) }}

                    {{ Form::bsText('description',$level->description,['placeholder' => 'Enter Kin description']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
