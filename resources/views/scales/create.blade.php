@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Scale</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        {!! Form::open(['action' => 'ScaleController@store','method' => 'POST']) !!}

        {{ Form::bsText('name','',['placeholder' => 'Enter scale name']) }}

        {{ Form::bsText('description','',['placeholder' => 'Enter scale description']) }}

        {{ Form::bsText('minimum','',['placeholder' => 'Enter minimum salary']) }}

        {{ Form::bsText('maximum','',['placeholder' => 'Enter maximum salary']) }}

                            <div class="form-group">

                    <label for="payroll_group_id" class="control-label">Payroll group</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="payroll_group_id" name="payroll_group_id">

                       <option value="">Select payroll group</option>

                       @foreach($payroll_groups as $payroll_group)

                       <option value="{{ $payroll_group->id }}">{{ $payroll_group->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addPayrollGroup">Add</button>
                      </div>

                    </div>

                    </div>



                    <div class="form-group">

                    <label for="pay_type_id" class="control-label">Pay type</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="pay_type_id" name="pay_type_id">

                       <option value="">Select pay type</option>

                       @foreach($pay_types as $pay_type)

                       <option value="{{ $pay_type->id }}">{{ $pay_type->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addPayType">Add</button>
                      </div>

                    </div>

                    </div>



                    <div class="form-group">

                    <label for="employment_type_id" class="control-label">Employement type</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="employment_type_id" name="employment_type_id">

                       <option value="">Select employement type</option>

                       @foreach($employment_types as $employment_type)

                       <option value="{{ $employment_type->id }}">{{ $employment_type->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addEmploymentType">Add</button>
                      </div>

                    </div>

                    </div>


        {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


