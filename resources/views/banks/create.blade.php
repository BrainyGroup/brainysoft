@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>{{ __('messages.add').' '.__('messages.bank')}}</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'BankController@store','method' => 'POST']) !!}


                    {{ Form::bsText('name','',['placeholder' => __('messages.enter name')]) }}

                    {{ Form::bsText('description',__('messages.description'),['placeholder' => __('messages.enter description')]) }}

                    {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
