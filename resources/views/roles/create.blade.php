@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.add').' '.__('messages.role')}}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'RoleController@store','method' => 'POST']) !!}


            {{ Form::bsText('name','',['placeholder' => __('messages.enter name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.enter description')]) }}

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection



 