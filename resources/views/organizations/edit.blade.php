@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Organizations </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => array('OrganizationController@update', $organization->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $organization->name ,['placeholder' => 'Enter organization name', 'required' => 'true']) }}

                    {{ Form::bsText('description', $organization->description,['placeholder' => 'Enter organization description']) }}

                    <div class="form-group">

                    <label for="bank" class="control-label">Bank</label>

                     <select class="form-control" id="bank" name="bank_id">

                       <option value="">Select bank</option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                    </div>


                      {{ Form::bsText('account_number','',['placeholder' => 'Enter account number']) }}


                    <div class="form-group">

                    <label for="statutory_type" class="control-label">Statutory Type</label>

                     <select class="form-control" id="statutory_type" name="statutory_type_id">

                       <option value="">Select statutory type</option>

                       @foreach($statutory_types as $statutory_type)

                       <option value="{{ $statutory_type->id }}">{{ $statutory_type->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
