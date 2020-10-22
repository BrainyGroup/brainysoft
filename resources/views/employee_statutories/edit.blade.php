@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.statutory')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

    

            {!! Form::open(['action' => array('Payroll\EmployeeStatutoryController@update', $employee_statutory_id),'method' => 'PUT']) !!}


                {{ Form::bsHidden('employee_statutory_id', $employee_statutory_id) }}

                

               

                    {{ Form::bsText('employee_statutory_no',$employee_statutory_no,['placeholder' => __('messages.employee nfs number'), 'label' => __('messages.nfs number')]) }}


          

            {{ Form::bsSubmit({{__('messages.save')}},['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection