@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.company') }}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\CompanyController@store','files' => true, 'method' => 'POST']) !!}

                    {{ Form::bsText('messages.name','',['placeholder' => __('messages.name'), 'label' => __('messages.name')]) }}

                    {{ Form::bsText('messages.description','',['placeholder' => __('messages.description'), 'label' => __('messages.description')]) }}

                    {{ Form::bsText('messages.employee','',['placeholder' => __('messages.number of employee'), 'label' => __('messages.number of employees')]) }}

                    {{ Form::bsText('messages.balance','',['placeholder' => __('messages.balance'), 'label' => __('messages.balance')]) }}

                    <div class="form-group">

                    <label for="trial" class="control-label">{{ __('messages.product mode') }}</label>

                     <select class="form-control" id="trial" name="trial">

                       <option value="true">{{ __('messages.trial') }}</option>

                       <option value="true">{{ __('messages.trial') }}</option>
                       <option value="false">{{ __('messages.production') }}</option>                      

                     </select>

                    </div>

                                                   



                    <div class="form-group">

                    <label for="country_name" class="control-label">{{ __('messages.country name') }}</label>

                     <select class="form-control" id="country_name" name="country_id">

                       <option value="">{{ __('messages.select country') }}</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsFile('logo','',['placeholder' => __('messages.logo'), 'label' => __('messages.logo')]) }}

                    {{ Form::bsText('website','',['placeholder' => __('messages.website'), 'label' => __('messages.website')]) }}

                    {{ Form::bsText( 'tin'),'',['placeholder' => __('messages.tin'), 'label' => __('messages.tin')]) }}

                    {{ Form::bsText('vrn','',['placeholder' => __('messages.VAT registration number'), 'label' => __('messages.vrn')]) }}

                    {{ Form::bsText('regno','',['placeholder' => __('messages.company registration number'), 'label' => __('messages.registration number')]) }}

                    {{ Form::bsText( 'slogan','',['placeholder' => __('messages.slogan'), 'label' => __('messages.slogan')]) }}

                    {{ Form::bsText('mission','',['placeholder' => __('messages.mission'), 'label' => __('messages.mission')]) }}

                    {{ Form::bsText('vision','',['placeholder' => __('messages.vision'), 'label' => __('messages.vision')]) }}

                    {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

