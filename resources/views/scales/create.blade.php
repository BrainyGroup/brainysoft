@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.scale')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        {!! Form::open(['action' => 'Payroll\ScaleController@store','method' => 'POST']) !!}

        {{ Form::bsText('name','',['placeholder' => __('messages.scale name'), 'label' => __('messages.name')]) }}

        {{ Form::bsText('description','',['placeholder' => __('messages.scale description'), 'label' => __('messages.description')]) }}

        {{ Form::bsText('minimum','',['placeholder' => __('messages.minimum salary'), 'label' => __('messages.minimum salary')]) }}

        {{ Form::bsText('maximum','',['placeholder' => __('messages.maximum salary'), 'label' => __('messages.maximum salary')]) }}

                  <div class="form-group">

                    <label for="payroll_group_id" class="control-label">{{__('messages.payroll group')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="payroll_group_id" name="payroll_group_id">

                       <option value="">{{__('messages.select payroll group')}}</option>

                       @foreach($payroll_groups as $payroll_group)

                       <option value="{{ $payroll_group->id }}">{{ $payroll_group->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addPayrollGroup">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>



                    <div class="form-group">

                    <label for="pay_type_id" class="control-label">{{__('messages.pay type')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="pay_type_id" name="pay_base_id">

                       <option value="">{{__('messages.select pay type')}}</option>

                       @foreach($pay_types as $pay_type)

                       <option value="{{ $pay_type->id }}">{{ $pay_type->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addPayType">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>



                    <div class="form-group">

                    <label for="employment_type_id" class="control-label">{{__('messages.employment type')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="employment_type_id" name="employment_type_id">

                       <option value="">{{__('messages.select employment type')}}</option>

                       @foreach($employment_types as $employment_type)

                       <option value="{{ $employment_type->id }}">{{ $employment_type->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addEmploymentType">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>


        {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}

        @include('layouts.model')
        </div>
    </div>
</div>    
@endsection


