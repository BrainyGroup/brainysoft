@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>{{ __('messages.edit').' '.__('messages.bank')}}</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => array('BankController@update', $bank->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $bank->name,['placeholder' => __('messages.enter name')]) }}

                    {{ Form::bsText('description', $bank->description ,['placeholder' => __('messages.enter description')]) }}

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
