@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h2>Edit Allowance for {{ $user->getFullName() }}</h2>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




                {!! Form::open(['action' => array('AllowanceController@update', $allowance->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('allowance_amount',$allowance->amount,['placeholder' => 'Enter Allowance Amount']) }}

                    @if($errors->has('amount'))

                      {{ $errors->first('amount')}}

                    @endif


                    {{ Form::bsHidden('user_id', request('user_id')) }}



                    <div class="form-group">

                    <label for="allowance_name" class="control-label">Allowance Name</label>

                     <select class="form-control" id="allowance_name" name="allowance_type_id">
dd($model_allowance_type);
                       <option value="{{ $model_allowance_type->id }}">{{$model_allowance_type->name}}</option>

                       @foreach($allowance_types as $allowance_type)

                       <option value="{{ $allowance_type->id }}">{{ $allowance_type->name }}</option>

                       @endforeach

                     </select>

                    </div>



                    {{ Form::bsDate('start_date', $allowance->start_date) }}

                    {{ Form::bsDate('end_date', $allowance->end_date) }}

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
