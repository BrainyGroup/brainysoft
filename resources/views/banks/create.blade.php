@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Bank</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'BankController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Allowance name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter Allowance description']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection