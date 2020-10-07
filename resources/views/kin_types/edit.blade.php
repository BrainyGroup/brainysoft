@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Kin types</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('Payroll\KinTypeController@update', $kin_type->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name', $kin_type->name,['placeholder' => 'Enter Kin name']) }}

            {{ Form::bsText('description', $kin_type->description,['placeholder' => 'Enter Kin description']) }}

            {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

       </div>
    </div>
</div>    
@endsection



