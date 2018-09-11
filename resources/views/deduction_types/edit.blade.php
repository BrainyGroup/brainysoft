@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Deduction types</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



{!! Form::open(['action' => array('DeductionTypeController@update', $deduction_type->id),'method' => 'PUT']) !!}
                

                    {{ Form::bsText('name', $deduction_type->name,['placeholder' => 'Enter Deduction name']) }}

                    {{ Form::bsText('description', $deduction_type->description,['placeholder' => 'Enter Deduction description']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
