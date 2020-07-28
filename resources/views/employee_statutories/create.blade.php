@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Statutories </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'EmployeeStatutoryController@store','method' => 'POST']) !!}

                {{ Form::bsHidden('employee_id', request('employee_id')) }}

                <div class="form-group">

                    <label for="statutory_id" class="control-label">Statutory</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="statutory_id" name="statutory_id">

                       <option value="">Select statutories</option>

                       @foreach($statutories as $statutory)

                       <option value="{{ $statutory->id }}">{{ $statutory->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    </div>

                    {{ Form::bsText('employee_statutory_no','',['placeholder' => 'Enter Employee NSF Number']) }}


          

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection








