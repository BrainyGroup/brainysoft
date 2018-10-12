@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit allowance type</div>

        <div class="card-body">

            {!! Form::open(['action' => array('AllowanceTypeController@update', $allowance_type->id),'method' => 'PUT']) !!}

            {{ Form::bsText('name',$allowance_type->name,['placeholder' => __('messages.enter name')]) }}         

            {{ Form::bsText('description',$allowance_type->description,['placeholder' => __('messages.enter description')]) }}
            
            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!} 
                      
        </div>
    </div>
</div>    
@endsection
