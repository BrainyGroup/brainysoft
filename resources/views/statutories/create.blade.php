@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.statutory')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\StatutoryController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => __('messages.statutory name'), 'label' => __('messages.name')]) }}

                    {{ Form::bsText('description','',['placeholder' => __('messages.statutory description'), 'label' => __('messages.description')]) }}

                    <div class="form-group">

                    <label for="organization" class="control-label">{{__('messages.organization')}}</label>

                     <select class="form-control" id="organization" name="organization_id" required >

                       <option value="">{{__('messages.select organization')}}</option>

                       @foreach($organizations as $organization)

                       <option value="{{ $organization->id }}">{{ $organization->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    <div class="form-group">

                    <label for="salary_base" class="control-label">{{__('messages.salary base')}}</label>

                     <select class="form-control" id="salary_base" name="salary_base_id" required >

                       <option value="">{{__('messages.select salary base')}}</option>

                       @foreach($salary_bases as $salary_base)

                       <option value="{{ $salary_base->id }}">{{ $salary_base->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="salary_base" class="control-label">{{__('messages.before paye')}}</label>

                     <select class="form-control" id="salary_base" name="before_paye" required >

                       <option value="0">{{__('messages.before paye')}}</option>

                       <option value="0">{{__('messages.false')}}</option>

                       <option value="1">{{__('messages.true')}}</option>


                     </select>

                    </div>




                    <div class="form-group">

                    <label for="statutory_type" class="control-label">{{__('messages.statutory type')}}</label>

                     <select class="form-control" id="statutory_type" name="statutory_type_id" required >

                       <option value="">{{__('messages.select statutory type')}}</option>

                       @foreach($statutory_types as $statutory_type)

                       <option value="{{ $statutory_type->id }}">{{ $statutory_type->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="selection" class="control-label">{{__('messages.is more than one for this type')}}?</label>

                     <select class="form-control" id="selection" name="selection" required >

                       <option value="1">{{__('messages.true')}}</option>                      

                       <option value="0">{{__('messages.false')}}</option>
                      <option value="1">{{__('messages.true')}}</option>

                     

                     </select>

                    </div>

                       <div class="form-group">

                    <label for="mandatory" class="control-label">{{__('messages.mandatory')}}</label>

                     <select class="form-control" id="mandatory" name="mandatory" required >

                      <option value="0">{{__('messages.false')}}</option>                      

                       <option value="1">{{__('messages.true')}}</option>
                      <option value="0">{{__('messages.false')}}</option>


                     </select>

                    </div>




                    {{ Form::bsText('employee_ratio','',['placeholder' => __('messages.employee ratio'), 'label' => __('messages.employee ratio')]) }}

                    {{ Form::bsText('employer_ratio','',['placeholder' => __('messages.employer ratio'), 'label' => __('messages.employer ratio')]) }}

                    {{ Form::bsDate('due_date') }}

                    {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}


        </div>
    </div>
</div>    
@endsection





