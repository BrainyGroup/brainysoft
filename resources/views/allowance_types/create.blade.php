@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>{{ __('messages.add').' '.__('messages.allowance_type')}}</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                    {!! Form::open(['action' => 'AllowanceTypeController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter Allowance name']) }}
                    @if($errors->has('name'))
                      {{ $errors->first('name')}}
                    @endif

                    {{ Form::bsText('description','',['placeholder' => 'Enter Allowance description']) }}
                    @if($errors->has('description'))
                      {{ $errors->first('description')}}
                    @endif

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
