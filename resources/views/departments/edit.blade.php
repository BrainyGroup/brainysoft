@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Department</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                    {!! Form::open(['action' => array('DepartmentController@update', $department->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $department->name,['placeholder' => 'Enter Deduction name']) }}

                    {{ Form::bsText('description', $department->description,['placeholder' => 'Enter Deduction description']) }}

                    {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
