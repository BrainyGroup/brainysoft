@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h2>Add Allowance for {{ $user->title.'. '.$user->firstname.' '.$user->lastname }}</h2>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'AllowanceController@store','method' => 'POST']) !!}

                    {{ Form::bsText('allowance_amount','',['placeholder' => 'Enter Allowance Amount']) }}

                    {{ Form::bsHidden('user_id', request('user_id')) }}

                    <!-- {{ Form::bsSelect('allowance_name', ['1' => 'Leave', '2' => 'House'],'') }} -->

                    <div class="form-group">

                    <label for="allowance_name" class="control-label">Allowance Name</label>

                     <select class="form-control" id="allowance_name" name="allowance_type_id">

                       <option value="">Select allowance type</option>

                       @foreach($allowance_types as $allowance_type)

                       <option value="{{ $allowance_type->id }}">{{ $allowance_type->name }}</option>

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
