@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Deduction for {{ $user->title.'. '.$user->firstname.' '.$user->lastname }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                  {!! Form::open(['action' => array('Payroll\DeductionController@update', $deduction->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('amount',$deduction->amount,['placeholder' => __('messages.deduction amount'), 'label' => __('messages.amount')]) }}

                    {{ Form::bsText('interest', $deduction->interest,['placeholder' => __('messages.deduction interest'), 'label' => __('messages.interest')]) }}    

                    {{ Form::bsHidden('employee_id', request('employee_id')) }}



                    <div class="form-group">

                    <label for="deduction_name" class="control-label">Deduction Name</label>

                     <select class="form-control" id="deduction_name" name="deduction_type_id">

                       <option value="{{ $current_deduction_type->id}}">{{ $current_deduction_type->name }}</option>

                       @foreach($deduction_types as $deduction_type)

                       <option value="{{ $deduction_type->id }}">{{ $deduction_type->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsDate('date_taken',$deduction->date_taken) }}

                    {{ Form::bsText('period',$deduction->period,['placeholder' => __('messages.period'), 'label' => __('messages.period')]) }}


                    {{ Form::bsDate('start_date', $deduction->start_date) }}
                

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>    
@endsection

