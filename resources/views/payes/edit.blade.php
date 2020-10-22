@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.paye')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('Payroll\PayeController@update', $paye->id),'method' => 'PUT']) !!}

                    <div class="form-group">

                    <label for="country" class="control-label">{{__('messages.country')}}</label>

                     <select class="form-control" id="country" name="country_id" required >

                       <option value="{{ $current_country->id }}">{{ $current_country->name }}</option>

                       @foreach($countries as $country)

                       <option value="{{ $country->id }}">{{ $country->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsNumber('minimum', $paye->minimum,['placeholder' => __('messages.minimum'), 'label' => __('messages.minimum'),'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('maximum', $paye->maximum,['placeholder' => __('messages.maximum'), 'label' => __('messages.maximum'),'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsNumber('ratio', $paye->ratio,['placeholder' => __('messages.ratio'), 'label' => __('messages.ratio'), 'required' => 'true','step' => '0.001','min' => '0.000']) }}

                    {{ Form::bsNumber('offset',$paye->offset,['placeholder' => __('messages.offset'), 'label' => __('messages.offset'), 'required' => 'true','step' => '0.01','min' => '0.00']) }}

                    {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



