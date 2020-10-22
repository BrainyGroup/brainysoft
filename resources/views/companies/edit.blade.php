@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.edit') }} {{ __('messages.company') }}</div>

        <div class="card-body">
            
                    {!! Form::open(['action' => array('Payroll\CompanyController@update', $company->id),'method' => 'PUT','files' => true]) !!}

                    {{ Form::bsText( 'name' ,$company->name,['placeholder' => __('messages.name'), 'label' => __('messages.name') ]) }}

                    {{ Form::bsText( 'description' ,$company->description,['placeholder' => __('messages.description'), 'label' => __('messages.description') ]) }}

                    {{ Form::bsText( 'employee' ,$company->employees,['placeholder' => __('messages.number of employee'), 'label' => __('messages.number of employees') ]) }}

                    {{ Form::bsText( 'balance',$company->balance,['placeholder' => __('messages.balance'), 'label' => __('messages.balance') ]) }}

                    <div class="form-group">

                    <label for="trial" class="control-label">{{ __('messages.product mode') }}</label>

                     <select class="form-control" id="trial" name="trial">

                       <option value="{{ $company->trial }}">{{ $company->trial }}</option>

                       <option value="true">{{ __('messages.trial') }}</option>
                       <option value="false">{{ __('messages.produsction') }}</option>                      

                     </select>

                    </div>




                    <div class="form-group">

                    <label for="country_name" class="control-label">{{ __('messages.country name') }}</label>

                     <select class="form-control" id="country_name" name="country_id">

                       <option value="{{$current_country->id}}">{{ $current_country->name}}</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsFile( 'logo' ,$company->logo,['placeholder' => __('messages.logo'), 'label' => __('messages.logo')]) }}

                    {{ Form::bsText('website' ,$company->website,['placeholder' => __('messages.website'), 'label' => __('messages.website')]) }}

                    {{ Form::bsText('tin' ,$company->tin,['placeholder' => __('messages.tin'), 'label' => __('messages.tin')]) }}

                    {{ Form::bsText( 'vrn' ,$company->vrn,['placeholder' => __('messages.VAT registration number'), 'label' => __('messages.vrn')]) }}

                    {{ Form::bsText( 'regno',$company->regno,['placeholder' => __('messages.company registration number'), 'label' => __('messages.registration number')]) }}

                    {{ Form::bsText('slogan' ,$company->slogan,['placeholder' => __('messages.slogan'), 'label' => __('messages.slogan')]) }}

                    {{ Form::bsText('mission' ,$company->mission,['placeholder' => __('messages.mission'), 'label' => __('messages.mission')]) }}

                    {{ Form::bsText( 'vision' ,$company->vision,['placeholder' => __('messages.vision'), 'label' => __('messages.vision')]) }}

                    {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


