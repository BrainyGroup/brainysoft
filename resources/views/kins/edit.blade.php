@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.kin')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                    {!! Form::open(['action' => array('Payroll\KinController@update', $kin->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $kin->name,['placeholder' => __('messages.kin name'), 'label' => __('messages.name')]) }}



                    {{ Form::bsText('mobile',$kin->mobile,['placeholder' =>  __('messages.kin description'), 'label' => __('messages.description')]) }}

                    <div class="form-group">

                    <label for="deduction_name" class="control-label">{{ __('messages.kin type')}}</label>

                     <select class="form-control" id="kin_type_name" name="kin_type_id">

                       <option value="{{ $current_kin_type->id}}">{{ $current_kin_type->name}}</option>

                       @foreach($kin_types as $kin_type)

                       <option value="{{ $kin_type->id }}">{{ $kin_type->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsHidden('employee_id', request('employee_id')) }}

                    {{ Form::bsSubmit( __('messages.save'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



