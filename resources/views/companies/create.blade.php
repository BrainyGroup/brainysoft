@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Company</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'CompanyController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Company name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter Company description']) }}



                    <div class="form-group">

                    <label for="country_name" class="control-label">Country Name</label>

                     <select class="form-control" id="country_name" name="country_id">

                       <option value="">Select country</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsText('logo','',['placeholder' => 'Enter Company logo']) }}

                    {{ Form::bsText('website','',['placeholder' => 'Enter website']) }}

                    {{ Form::bsText('tin','',['placeholder' => 'Enter TIN']) }}

                    {{ Form::bsText('vrn','',['placeholder' => 'Enter VAT registration Number']) }}

                    {{ Form::bsText('regno','',['placeholder' => 'Enter Company registrion number']) }}

                    {{ Form::bsText('slogan','',['placeholder' => 'Enter Company slogan']) }}

                    {{ Form::bsText('mission','',['placeholder' => 'Enter Company mission']) }}

                    {{ Form::bsText('vision','',['placeholder' => 'Enter Company vision']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
