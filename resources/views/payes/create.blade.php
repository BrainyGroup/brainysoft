@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => 'PayeController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="country" class="control-label">Country</label>

                     <select class="form-control" id="country" name="country_id" required >

                       <option value="">Select country</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsNumber('minimum','',['placeholder' => 'Enter minimum salary','required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('maximum','',['placeholder' => 'Enter maximum salary','required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('ratio','',['placeholder' => 'Enter ratio', 'required' => 'true','step' => '0.001','max' => '0.999']) }}

                    @if($errors->has('ratio'))

                      {{ $errors->first('ratio')}}

                    @endif

                    {{ Form::bsNumber('offset','',['placeholder' => 'Enter offset', 'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}


        </div>
    </div>
</div>    
@endsection



