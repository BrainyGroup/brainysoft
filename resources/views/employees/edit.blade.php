@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Employee {{ $user->title.'. '.$user->firstname.' '.$user->lastname }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                      {!! Form::open(['action' => array('EmployeeController@update', $employee->id),'method' => 'PUT']) !!}



                    <div class="form-group">

                    <label for="center" class="control-label">Center</label>

                     <select class="form-control" id="center" name="center_id">

                       <option value="{{ $current_center->id }}">{{ $current_center->name }}</option>

                       @foreach($centers as $center)

                       <option value="{{ $center->id }}">{{ $center->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    

                    <div class="form-group">

                    <label for="department" class="control-label">Department</label>

                     <select class="form-control" id="department" name="department_id">

                       <option value="{{ $current_department->id }}">{{ $current_department->name }}</option>

                       @foreach($departments as $department)

                       <option value="{{ $department->id }}">{{ $department->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="designation" class="control-label">Designation</label>

                     <select class="form-control" id="designation" name="designation_id">

                       <option value="{{ $current_designation->id }}">{{ $current_designation->name }}</option>

                       @foreach($designations as $designation)

                       <option value="{{ $designation->id }}">{{ $designation->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    <div class="form-group">

                    <label for="bank" class="control-label">Bank</label>

                     <select class="form-control" id="bank" name="bank_id">

                       <option value="{{ $current_bank->id }}">{{ $current_bank->name }}</option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    {{ Form::bsText('account_number', $employee->account_number,['placeholder' => 'Enter account number']) }}

                    {{ Form::bsText('tin', $employee->tin,['placeholder' => 'Enter tin number']) }}

                  {{ Form::bsNumber('salary', $employee_salary->amount ,['placeholder' => 'Enter Salary Amount']) }}



                  {{ Form::bsText('start_date', $employee->start_date,['readonly' => true]) }}

                   {{ Form::bsText('end_date', $employee->end_date,['readonly' => true]) }}


                


                    {{ Form::bsHidden('employee_id', $employee->id) }}

                    {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}




                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



