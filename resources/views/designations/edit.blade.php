@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Designation</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => array('DesignationController@update', $designation->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $designation->name,['placeholder' => 'Enter Deduction name']) }}

                    {{ Form::bsText('description', $designation->description,['placeholder' => 'Enter Deduction description']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
