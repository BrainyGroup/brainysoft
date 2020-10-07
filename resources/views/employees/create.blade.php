@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">New Employee {{ $user->title.'. '.$user->firstname.' '.$user->middlename.' '.$user->lastname }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => 'Payroll\EmployeeController@store','method' => 'POST']) !!}

 

                    <div class="form-group">

                    <label for="center" class="control-label">Center</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="center" name="center_id">

                       <option value="">Select center</option>

                       @foreach($centers as $center)

                       <option value="{{ $center->id }}">{{ $center->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addCenter">Add</button>
                      </div>
                    </div>

                    </div>



                    <div class="form-group">

                    <label for="department" class="control-label">Department</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="department" name="department_id">

                       <option value="">Select department</option>

                       @foreach($departments as $department)

                       <option value="{{ $department->id }}">{{ $department->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addDepartment">Add</button>
                      </div>

                    </div>

                    </div>

                    <div class="form-group">

                    <label for="designation" class="control-label">Designation</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="designation" name="designation_id">

                       <option value="">Select designation</option>

                       @foreach($designations as $designation)

                       <option value="{{ $designation->id }}">{{ $designation->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addDesignation">Add</button>
                      </div>

                    </div>

                    </div>


                    <div class="form-group">

                    <label for="bank" class="control-label">Bank</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="bank" name="bank_id">

                       <option value="">Select bank </option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addBank">Add</button>
                      </div>

                    </div>

                    </div>

                  

                    {{ Form::bsText('account_number','',['placeholder' => 'Enter account number']) }}

                    {{ Form::bsText('tin','',['placeholder' => 'Enter tin number']) }}

                  {{ Form::bsNumber('salary','',['placeholder' => 'Enter Salary Amount']) }}

                    {{ Form::bsDate('start_date') }}

               

                    {{ Form::bsHidden('user_id', request('user_id')) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}




                    {!! Form::close() !!}



   @include('layouts.model')

        </div>
    </div>
</div>    
@endsection


