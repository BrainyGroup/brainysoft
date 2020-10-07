@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Company</div>

        <div class="card-body">
            
                    {!! Form::open(['action' => array('Payroll\CompanyController@update', $company->id),'method' => 'PUT','files' => true]) !!}

                    {{ Form::bsText('name',$company->name,['placeholder' => 'Enter Company name']) }}

                    {{ Form::bsText('description',$company->description,['placeholder' => 'Enter Company description']) }}

                    {{ Form::bsText('employees',$company->employees,['placeholder' => 'Enter number of employee']) }}

                    {{ Form::bsText('balance',$company->balance,['placeholder' => 'Enter balance']) }}

                    <div class="form-group">

                    <label for="trial" class="control-label">Product Mode</label>

                     <select class="form-control" id="trial" name="trial">

                       <option value="{{ $company->trial }}">{{ $company->trial }}</option>

                       <option value="true">Trial</option>
                       <option value="false">Production</option>                      

                     </select>

                    </div>




                    <div class="form-group">

                    <label for="country_name" class="control-label">Country Name</label>

                     <select class="form-control" id="country_name" name="country_id">

                       <option value="{{$current_country->id}}">{{ $current_country->name}}</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsFile('logo',$company->logo,['placeholder' => 'Enter Company logo']) }}

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


