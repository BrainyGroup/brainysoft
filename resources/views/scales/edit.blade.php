@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Scales</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['action' => array('Payroll\ScaleController@update', $scale->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $scale->name,['placeholder' => 'Enter scale name']) }}

            {{ Form::bsText('description', $scale->description,['placeholder' => 'Enter scale description']) }}

            {{ Form::bsText('minimum', $scale->minimum,['placeholder' => 'Enter minimum salary']) }}

            {{ Form::bsText('maximum', $scale->maximum,['placeholder' => 'Enter maximum salary']) }}

            {{ Form::bsText('schedule',$scale->schedule,['placeholder' => 'Enter salary circle']) }}

            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







