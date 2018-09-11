@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Company</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => array('CompanyController@update', $company->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name',$company->name,['placeholder' => 'Enter Company name']) }}

                    {{ Form::bsText('description',$company->description,['placeholder' => 'Enter Company description']) }}



                    <div class="form-group">

                    <label for="country_name" class="control-label">Country Name</label>

                     <select class="form-control" id="country_name" name="country_id">

                       <option value="{{$current_country->id}}">{{ $current_country->name}}</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsText('logo',$company->logo,['placeholder' => 'Enter Company logo']) }}

                    {{ Form::bsText('website',$company->website,['placeholder' => 'Enter website']) }}

                    {{ Form::bsText('tin',$company->tin,['placeholder' => 'Enter TIN']) }}

                    {{ Form::bsText('vrn',$company->vrn,['placeholder' => 'Enter VAT registration Number']) }}

                    {{ Form::bsText('regno',$company->regno,['placeholder' => 'Enter Company registrion number']) }}

                    {{ Form::bsText('slogan',$company->slogan,['placeholder' => 'Enter Company slogan']) }}

                    {{ Form::bsText('mission',$company->mission,['placeholder' => 'Enter Company mission']) }}

                    {{ Form::bsText('vision',$company->vision,['placeholder' => 'Enter Company vision']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
