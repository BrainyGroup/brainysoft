@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Payes</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'PayeController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="country" class="control-label">Country</label>

                     <select class="form-control" id="country" name="country_id" required >

                       <option value="">Select country</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsText('minimum','',['placeholder' => 'Enter minimum salary']) }}

                    {{ Form::bsText('maximum','',['placeholder' => 'Enter maximum salary']) }}

                    {{ Form::bsText('ratio','',['placeholder' => 'Enter ratio', 'required' => 'true']) }}

                    {{ Form::bsText('offset','',['placeholder' => 'Enter offset']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
