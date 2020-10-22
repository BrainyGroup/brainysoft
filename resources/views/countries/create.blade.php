@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.country') }}</div>

        <div class="card-body">

             {!! Form::open(['action' => 'Payroll\CountryController@store','method' => 'POST']) !!}

             {{ Form::bsText( 'name','',['placeholder' => __('messages.country name'), 'label' => __('messages.name')]) }}
             
             {{ Form::bsText( 'description','',['placeholder' => __('messages.country description'), 'label' => __('messages.description')]) }}

             {{ Form::bsText('country_code','',['placeholder' => __('messages.country code'), 'label' => __('messages.country code')]) }}

             {{ Form::bsText('flag','',['placeholder' => __('messages.flag'),'label' => __('messages.flag')]) }}

             {{ Form::bsText('currency_code','',['placeholder' => __('messages.currency code'),'label' => __('messages.currency code')]) }}

             {{ Form::bsText('currency_name','',['placeholder' => __('messages.currency name'),'label' => __('messages.currency name')]) }}

             {{ Form::bsText('capital','',['placeholder' => __('messages.capital city'),'label' => __('messages.capital city')]) }}

             {{ Form::bsText('language_code','',['placeholder' => __('messages.language code'),'label' => __('messages.language code')]) }}

             {{ Form::bsText('language','',['placeholder' => __('messages.language'),'label' => __('messages.language')]) }}

             {{ Form::bsNumber('employees','',['placeholder' => __('messages.number of employees'),'label' => __('messages.employees')]) }}

             {{ Form::bsText('map','',['placeholder' => __('messages.country map'),'label' => __('messages.country map')]) }}

             {{ Form::bsNumber('system_users','',['placeholder' => __('messages.number of users'),'label' => __('messages.system users')]) }}

             {{ Form::bsText('google_cordinate','',['placeholder' => __('messages.google cordinate'),'label' => __('messages.google cordinate')]) }}

             {{ Form::bsSubmit( 'add',['class' => 'btn btn-primary']) }}

             {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


