@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Salary Bases </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => array('SalaryBaseController@update', $salary_base->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $salary_base->name,['placeholder' => 'Enter salary name']) }}

                    {{ Form::bsText('description', $salary_base->description,['placeholder' => 'Enter salary description']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
