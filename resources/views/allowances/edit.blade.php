@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.allowance') }}</div>

        <div class="card-body">
                {!! Form::open(['action' => array('Payroll\AllowanceController@update', $allowance->id),'method' => 'PUT']) !!}

                {{ Form::bsText(__('messages.allowance_amount'), $allowance->amount, ['placeholder' => __('messages.allowance amount')]) }} 


                {{ Form::bsHidden('user_id', request('user_id')) }}



                    <div class="form-group">

                    <label for="allowance_name" class="control-label">{{__('messages.name')}}</label>

                     <select class="form-control" id="allowance_name" name="allowance_type_id">

                       <option value="{{ $model_allowance_type->id }}">{{$model_allowance_type->name}}</option>

                       @foreach($allowance_types as $allowance_type)

                       <option value="{{ $allowance_type->id }}">{{ $allowance_type->name }}</option>

                       @endforeach

                     </select>

                    </div>



                    {{ Form::bsDate(__('messages.start_date'), $allowance->start_date) }}

                    {{ Form::bsDate(__('messages.end_date'), $allowance->end_date) }}

                    {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection





               
