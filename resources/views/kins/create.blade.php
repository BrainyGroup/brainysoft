@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Kin</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => 'Payroll\KinController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Kin name']) }}

                    {{ Form::bsText('mobile','',['placeholder' => 'Enter Kin description']) }}

                    <div class="form-group">

                    <label for="deduction_name" class="control-label">Kin type</label>

                     <select class="form-control" id="kin_type_name" name="kin_type_id">

                       <option value="">Select kin type</option>

                       @foreach($kin_types as $kin_type)

                       <option value="{{ $kin_type->id }}">{{ $kin_type->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsHidden('employee_id', request('employee_id')) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>    
@endsection





