@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
           {!! Form::open(['action' => array('Payroll\CountryController@update', $country->id),'method' => 'PUT']) !!}

             {{ Form::bsText('name',$country->name,['placeholder' => 'Enter country name']) }}

             {{ Form::bsText('description',$country->description,['placeholder' => 'Enter country description']) }}

             {{ Form::bsText('country_code',$country->country_code,['placeholder' => 'Enter country code']) }}

             {{ Form::bsText('flag',$country->flag,['placeholder' => 'Enter country flag']) }}

             {{ Form::bsText('currency_code',$country->currency_code,['placeholder' => 'Enter currency code']) }}

             {{ Form::bsText('currency_name',$country->currency_name,['placeholder' => 'Enter currency name']) }}

             {{ Form::bsText('capital',$country->capital,['placeholder' => 'Enter capital']) }}

             {{ Form::bsText('language_code',$country->language_code,['placeholder' => 'Enter language code']) }}

             {{ Form::bsText('language',$country->language,['placeholder' => 'Enter language']) }}

             {{ Form::bsNumber('employees',$country->employees,['placeholder' => 'Enter number of employee']) }}

             {{ Form::bsText('map',$country->map,['placeholder' => 'Enter country map']) }}

             {{ Form::bsNumber('system_users',$country->system_users,['placeholder' => 'Enter number of users']) }}

             {{ Form::bsText('google_cordinate',$country->google_cordinate,['placeholder' => 'Enter google cordinate']) }}

           {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

           {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


