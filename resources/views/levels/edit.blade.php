@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.company structre level')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        {!! Form::open(['action' => array('Payroll\LevelController@update', $level->id),'method' => 'PUT']) !!}

        {{ Form::bsText('name',$level->name,['placeholder' =>  __('messages.level name'), 'label' => __('messages.name')]) }}

        {{ Form::bsText('description',$level->description,['placeholder' => __('messages.level description'), 'label' => __('messages.description')]) }}

        {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}


        </div>
    </div>
</div>    
@endsection





