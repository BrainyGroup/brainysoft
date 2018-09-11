@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Edit Payes</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => array('PayeController@update', $paye->id),'method' => 'PUT']) !!}

                    <div class="form-group">

                    <label for="country" class="control-label">Country</label>

                     <select class="form-control" id="country" name="country_id" required >

                       <option value="">Select country</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsNumber('minimum', $paye->minimum,['placeholder' => 'Enter minimum salary','required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('maximum', $paye->maximum,['placeholder' => 'Enter maximum salary','required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('ratio', $paye->ratio,['placeholder' => 'Enter ratio', 'required' => 'true','step' => '0.001','max' => '0.999']) }}

                    {{ Form::bsNumber('offset',$paye->offset,['placeholder' => 'Enter offset', 'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
