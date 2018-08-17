@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h2>New Employee {{ $user->title.'. '.$user->firstname.' '.$user->middlename.' '.$user->lastname }}</h2>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'EmployeeController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="level" class="control-label">Level</label>

                     <select class="form-control" id="level" name="level_id">

                       <option value="">Select Structure level</option>

                       @foreach($levels as $level)

                       <option value="{{ $level->id }}">{{ $level->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="center" class="control-label">Center</label>

                     <select class="form-control" id="center" name="center_id">

                       <option value="">Select center</option>

                       @foreach($centers as $center)

                       <option value="{{ $center->id }}">{{ $center->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="Scales" class="control-label">Scales</label>

                     <select class="form-control" id="scale" name="scale_id">

                       <option value="">Select salary scale</option>

                       @foreach($centers as $center)

                       <option value="{{ $center->id }}">{{ $center->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="department" class="control-label">Department</label>

                     <select class="form-control" id="department" name="department_id">

                       <option value="">Select allowance type</option>

                       @foreach($departments as $department)

                       <option value="{{ $department->id }}">{{ $department->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="designation" class="control-label">Designation</label>

                     <select class="form-control" id="designation" name="designation_id">

                       <option value="">Select designation</option>

                       @foreach($designations as $designation)

                       <option value="{{ $designation->id }}">{{ $designation->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    <div class="form-group">

                    <label for="bank" class="control-label">Bank</label>

                     <select class="form-control" id="bank" name="bank_id">

                       <option value="">Select allowance type</option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsText('account_number','',['placeholder' => 'Enter account number']) }}

                  {{ Form::bsNumber('salary','',['placeholder' => 'Enter Salary Amount']) }}

                    {{ Form::bsDate('start_date') }}

                    {{ Form::bsDate('end_date') }}

                    {{ Form::bsHidden('user_id', request('user_id')) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}




                    {!! Form::close() !!}

                    @if(count($errors)>0)
                  @include('layouts.errors')
                  @endif



        </div>
    </div>
</div>
@endsection
