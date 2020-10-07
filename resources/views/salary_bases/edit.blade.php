@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Salary Base</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['action' => array('Payroll\SalaryBaseController@update', $salary_base->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $salary_base->name,['placeholder' => 'Enter salary name']) }}

            {{ Form::bsText('description', $salary_base->description,['placeholder' => 'Enter salary description']) }}

            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
          
        </div>
    </div>
</div>    
@endsection





