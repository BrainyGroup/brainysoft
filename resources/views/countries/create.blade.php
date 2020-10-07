@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">

             {!! Form::open(['action' => 'Payroll\CountryController@store','method' => 'POST']) !!}

             {{ Form::bsText('name','',['placeholder' => 'Enter country name']) }}

             {{ Form::bsText('description','',['placeholder' => 'Enter country description']) }}

             {{ Form::bsText('country_code','',['placeholder' => 'Enter country code']) }}

             {{ Form::bsText('flag','',['placeholder' => 'Enter country flag']) }}

             {{ Form::bsText('currency_code','',['placeholder' => 'Enter currency code']) }}

             {{ Form::bsText('currency_name','',['placeholder' => 'Enter currency name']) }}

             {{ Form::bsText('capital','',['placeholder' => 'Enter capital']) }}

             {{ Form::bsText('language_code','',['placeholder' => 'Enter language code']) }}

             {{ Form::bsText('language','',['placeholder' => 'Enter language']) }}

             {{ Form::bsNumber('employees','',['placeholder' => 'Enter number of employee']) }}

             {{ Form::bsText('map','',['placeholder' => 'Enter country map']) }}

             {{ Form::bsNumber('system_users','',['placeholder' => 'Enter number of users']) }}

             {{ Form::bsText('google_cordinate','',['placeholder' => 'Enter google cordinate']) }}

             {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

             {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


