@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>{{ __('messages.edit').' '.__('messages.allowance_type')}}</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => array('AllowanceTypeController@update', $allowance_type->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name',$allowance_type->name,['placeholder' => __('messages.enter name')]) }}
                    @if($errors->has('name'))
                      {{ $errors->first('name')}}
                    @endif

                    {{ Form::bsText('description',$allowance_type->description,['placeholder' => __('messages.enter description')]) }}
                    @if($errors->has('description'))
                      {{ $errors->first('description')}}
                    @endif

                    {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
