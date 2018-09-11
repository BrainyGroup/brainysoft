@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>{{ __('messages.edit').' '.__('messages.center')}}</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => array('CenterController@update', $center->id),'method' => 'PUT']) !!}

                    {{ Form::bsText(__('messages.number'),$center->number,['placeholder' => __('messages.enter number')]) }}

                    {{ Form::bsText(__('messages.name'),$center->name,['placeholder' => __('messages.enter name')]) }}

                    {{ Form::bsText(__('messages.description'),$center->description,['placeholder' => __('messages.enter description')]) }}

                    {{ Form::bsSubmit(__('messages.update'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
