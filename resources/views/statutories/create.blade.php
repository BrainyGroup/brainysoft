@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Statutory </h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'StatutoryController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter statutory name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter statutory description']) }}

                    <div class="form-group">

                    <label for="organization" class="control-label">Organization</label>

                     <select class="form-control" id="organization" name="organization_id" required >

                       <option value="">Select organization</option>

                       @foreach($organizations as $organization)

                       <option value="{{ $organization->id }}">{{ $organization->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    <div class="form-group">

                    <label for="salary_base" class="control-label">Salary Base</label>

                     <select class="form-control" id="salary_base" name="salary_base_id" required >

                       <option value="">Select salary base</option>

                       @foreach($salary_bases as $salary_base)

                       <option value="{{ $salary_base->id }}">{{ $salary_base->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    <div class="form-group">

                    <label for="statutory_type" class="control-label">Statutory type</label>

                     <select class="form-control" id="statutory_type" name="statutory_type_id" required >

                       <option value="">Select statutory_type</option>

                       @foreach($statutory_types as $statutory_type)

                       <option value="{{ $statutory_type->id }}">{{ $statutory_type->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    {{ Form::bsText('employee_ratio','',['placeholder' => 'Enter employee ratio']) }}

                    {{ Form::bsText('employer_ratio','',['placeholder' => 'Enter employer ratio']) }}

                    {{ Form::bsDate('due_date') }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
