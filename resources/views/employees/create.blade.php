@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.employee')}} {{ $user->title.'. '.$user->firstname.' '.$user->middlename.' '.$user->lastname }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => 'Payroll\EmployeeController@store','method' => 'POST']) !!}

 

                    <div class="form-group">

                    <label for="center" class="control-label">{{__('messages.center')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="center" name="center_id">

                       <option value="">{{__('messages.select center')}}</option>

                       @foreach($centers as $center)

                       <option value="{{ $center->id }}">{{ $center->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addCenter">{{__('messages.add')}}</button>
                      </div>
                    </div>

                    </div>



                    <div class="form-group">

                    <label for="department" class="control-label">{{__('messages.department')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="department" name="department_id">

                       <option value="">{{__('messages.select department')}}</option>

                       @foreach($departments as $department)

                       <option value="{{ $department->id }}">{{ $department->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addDepartment">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>

                    <div class="form-group">

                    <label for="designation" class="control-label">{{__('messages.designation')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="designation" name="designation_id">

                       <option value="">{{__('messages.select designation')}}</option>

                       @foreach($designations as $designation)

                       <option value="{{ $designation->id }}">{{ $designation->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addDesignation">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>


                    <div class="form-group">

                    <label for="bank" class="control-label">{{__('messages.bank')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="bank" name="bank_id">

                       <option value="">{{__('messages.select bank')}} </option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addBank">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>

                  

                    {{ Form::bsText('account_number','',['placeholder' => __('messages.account number'), 'label' => __('messages.account number')]) }}

                    {{ Form::bsText('tin','',['placeholder' => __('messages.tin number'), 'label' => __('messages.tin number')]) }}

                  {{ Form::bsNumber('salary','',['placeholder' => __('messages.salary amount'), 'label' => __('messages.salary amount')]) }}

                    {{ Form::bsDate('start_date') }}

               

                    {{ Form::bsHidden('user_id', request('user_id')) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}




                    {!! Form::close() !!}



   @include('layouts.model')

        </div>
    </div>
</div>    
@endsection


