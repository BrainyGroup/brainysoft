@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.country') }}</div>

        <div class="card-body">
           {!! Form::open(['action' => array('Payroll\CountryController@update', $country->id),'method' => 'PUT']) !!}

             {{ Form::bsText('name',$country->name,['placeholder' => __('messages.country name'), 'label' => __('messages.name')]) }}

             {{ Form::bsText('description',$country->description,['placeholder' => __('messages.country description'), 'label' => __('messages.description')]) }}

             {{ Form::bsText('country_code',$country->country_code,['placeholder' => __('messages.country code'), 'label' => __('messages.country code')]) }}

             {{ Form::bsText('flag',$country->flag,['placeholder' => __('messages.flag'), 'label' => __('messages.flag')]) }}

             {{ Form::bsText('currency_code',$country->currency_code,['placeholder' => __('messages.currency code'), 'label' => __('messages.currency code')]) }}

             {{ Form::bsText('currency_name',$country->currency_name,['placeholder' => __('messages.currency name'), 'label' => __('messages.currency name')]) }}

             {{ Form::bsText('capital',$country->capital,['placeholder' => __('messages.name'), 'label'=> __('messages.capital city')]) }}

             {{ Form::bsText('language_code',$country->language_code,['placeholder' => __('messages.language code'), 'label' => __('messages.language code')]) }}

             {{ Form::bsText('language',$country->language,['placeholder' => __('messages.language'), 'label' => __('messages.language')]) }}

             {{ Form::bsNumber('employees',$country->employees,['placeholder' => __('messages.number of employee'), 'label' => __('messages.employees')]) }}

             {{ Form::bsText('map',$country->map,['placeholder' => __('messages.country map'), 'label' => __('messages.country map')]) }}

             {{ Form::bsNumber('system_users',$country->system_users,['placeholder' => __('messages.system users'), 'label' => __('messages.system users')]) }}

             {{ Form::bsText('google_cordinate',$country->google_cordinate,['placeholder' => __('messages.google cordinate'), 'label' => __('messages.google cordinate')]) }}

           {{ Form::bsSubmit( __('messages.save'),['class' => 'btn btn-primary']) }}

           {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


