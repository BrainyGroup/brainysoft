@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.settings')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\SettingController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => __('messages.settings name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.setting description'), 'label' => __('messages.description')]) }}

            {{ Form::bsText('value','',['placeholder' => __('messages.setting value'), 'label' => __('messages.value')]) }}

            {{ Form::bsSubmit(__('messages.submit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

