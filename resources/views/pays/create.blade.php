@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>Add Payes</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                    {!! Form::open(['action' => 'PayController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="Year" class="control-label">Year</label>

                     <select class="form-control" id="year" name="year" required >

                       <option value="">Select year</option>

                       @for($i = 1; $i<=18; $i++)

                       <option value="{{ 2000 + $i }}">{{ 2000 + $i }}</option>

                       @endfor

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="month" class="control-label">Month</label>

                     <select class="form-control" id="month" name="month" required >

                       <option value="">Select month</option>

                       @for($i = 01; $i<=12; $i++)

                       <option value="{{ $i }}">{{ $i }}</option>

                       @endfor

                     </select>

                    </div>


                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}



        </div>
    </div>
</div>
@endsection
