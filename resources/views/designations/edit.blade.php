@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Designation</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


                    {!! Form::open(['action' => array('DesignationController@update', $designation->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $designation->name,['placeholder' => 'Enter Deduction name']) }}

                    {{ Form::bsText('description', $designation->description,['placeholder' => 'Enter Deduction description']) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




