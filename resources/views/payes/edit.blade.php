@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit payes</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('PayeController@update', $paye->id),'method' => 'PUT']) !!}

                    <div class="form-group">

                    <label for="country" class="control-label">Country</label>

                     <select class="form-control" id="country" name="country_id" required >

                       <option value="{{ $current_country->id }}">{{ $current_country->name }}</option>

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



