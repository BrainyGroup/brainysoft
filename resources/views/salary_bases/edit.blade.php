@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.salary base')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['action' => array('Payroll\SalaryBaseController@update', $salary_base->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $salary_base->name,['placeholder' => __('messages.salary base name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description', $salary_base->description,['placeholder' => __('messages.salary base description'), 'label' => __('messages.description')]) }}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
          
        </div>
    </div>
</div>    
@endsection





