@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.paye')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => 'Payroll\PayeController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="country" class="control-label">{{__('messages.country')}}</label>

                     <select class="form-control" id="country" name="country_id" required >

                       <option value="">{{__('messages.select country')}}</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsNumber('minimum','',['placeholder' => __('messages.minimum'), 'label' => __('messages.minimum'),'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('maximum','',['placeholder' => __('messages.maximum'), 'label' => __('messages.maximum'),'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('ratio','',['placeholder' => __('messages.ratio'), 'label' => __('messages.ratio'), 'required' => 'true','step' => '0.001', 'min' => '0.000','max' => '0.999']) }}

                    @if($errors->has('ratio'))

                      {{ $errors->first('ratio')}}

                    @endif

                    {{ Form::bsNumber('offset','',['placeholder' => __('messages.offset'), 'label' => __('messages.offset'), 'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}


        </div>
    </div>
</div>    
@endsection



