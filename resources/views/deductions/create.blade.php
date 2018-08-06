@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h2>Add Deduction for {{ $user->title.'. '.$user->firstname.' '.$user->lastname }}</h2>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'DeductionController@store','method' => 'POST']) !!}

                    {{ Form::bsText('amount','',['placeholder' => 'Enter Deduction Amount']) }}

                    {{ Form::bsHidden('employee_id', request('employee_id')) }}

                    <!-- {{ Form::bsSelect('deduction_name', ['1' => 'Leave', '2' => 'House'],'') }} -->

                    <div class="form-group">

                    <label for="deduction_name" class="control-label">Deduction Name</label>

                     <select class="form-control" id="deduction_name" name="deduction_type_id">

                       <option value="">Select deduction type</option>

                       @foreach($deduction_types as $deduction_type)

                       <option value="{{ $deduction_type->id }}">{{ $deduction_type->name }}</option>

                       @endforeach

                     </select>

                    </div>



                    {{ Form::bsDate('start_date') }}

                    {{ Form::bsDate('end_date') }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
