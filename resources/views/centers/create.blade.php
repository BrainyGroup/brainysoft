@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>{{ __('messages.add').' '.__('messages.center')}}</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'CenterController@store','method' => 'POST']) !!}

                    {{ Form::bsText(__('messages.number'),'',['placeholder' => __('messages.enter number')]) }}

                    {{ Form::bsText(__('messages.name'),'',['placeholder' => __('messages.enter name')]) }}

                    {{ Form::bsText(__('messages.description'),'',['placeholder' => __('messages.enter description')]) }}

                    {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
