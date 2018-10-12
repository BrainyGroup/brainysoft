@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Company/div>

        <div class="card-body">
            {!! Form::open(['action' => 'CompanyController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Company name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter Company description']) }}

                    {{ Form::bsText('employee','',['placeholder' => 'Enter number of employee']) }}

                    {{ Form::bsText('balance','',['placeholder' => 'Enter balance']) }}

                    <div class="form-group">

                    <label for="trial" class="control-label">Product Mode</label>

                     <select class="form-control" id="trial" name="trial">

                       <option value="true">Trial</option>

                       <option value="true">Trial</option>
                       <option value="false">Production</option>                      

                     </select>

                    </div>

                                                   



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

                    {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

