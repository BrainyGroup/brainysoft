@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Statutory </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 {!! Form::open(['action' => array('StatutoryController@update', $statutory->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $statutory->name,['placeholder' => 'Enter statutory name']) }}

                    {{ Form::bsText('description', $statutory->description,['placeholder' => 'Enter statutory description']) }}

                    <div class="form-group">

                    <label for="organization" class="control-label">Organization</label>

                     <select class="form-control" id="organization" name="organization_id" required >

                       <option value="{{ $current_organization->id }}">{{ $current_organization->name}}</option>

                       @foreach($organizations as $organization)

                       <option value="{{ $organization->id }}">{{ $organization->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    <div class="form-group">

                    <label for="salary_base" class="control-label">Salary Base</label>

                     <select class="form-control" id="salary_base" name="salary_base_id" required >

                       <option value="{{ $current_salary_base->id }}">{{ $current_salary_base->name }}</option>

                       @foreach($salary_bases as $salary_base)

                       <option value="{{ $salary_base->id }}">{{ $salary_base->name }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="salary_base" class="control-label">Before paye</label>

                     <select class="form-control" id="salary_base" name="before_paye" required >

                       <option value="0">false</option>

                       <option value="0">false</option>

                       <option value="1">true</option>


                     </select>

                    </div>


                    <div class="form-group">

                    <label for="statutory_type" class="control-label">Statutory type</label>

                     <select class="form-control" id="statutory_type" name="statutory_type_id" required >

                       <option value="{{ $current_statutory_type->id }}">{{ $current_statutory_type->name}}</option>

                       @foreach($statutory_types as $statutory_type)

                       <option value="{{ $statutory_type->id }}">{{ $statutory_type->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    {{ Form::bsText('employee_ratio', $statutory->employee,['placeholder' => 'Enter employee ratio']) }}

                    {{ Form::bsText('employer_ratio', $statutory->employer,['placeholder' => 'Enter employer ratio']) }}

                    {{ Form::bsDate('due_date', $statutory->date_required) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection


