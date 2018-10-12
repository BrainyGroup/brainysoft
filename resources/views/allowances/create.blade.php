@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Allowance for {{ $user->title.'. '.$user->firstname.' '.$user->lastname }}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'AllowanceController@store','method' => 'POST']) !!}

                    {{ Form::bsText('allowance_amount','',['placeholder' => 'Enter Allowance Amount']) }}  


                    {{ Form::bsHidden('user_id', request('user_id')) }}



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

