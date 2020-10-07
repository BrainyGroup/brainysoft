@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Settings</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\SettingController@store','method' => 'POST']) !!}

            {{ Form::bsText('name','',['placeholder' => 'Enter setting name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter setting desctiption description']) }}

            {{ Form::bsText('value','',['placeholder' => 'Enter setting value']) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

