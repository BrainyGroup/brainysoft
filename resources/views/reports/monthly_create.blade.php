@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add pays</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
{!! Form::open(['action' => 'PayController@store','method' => 'POST']) !!}

                    <div class="form-group">

                    <label for="Year" class="control-label">Year</label>

                     <select class="form-control" id="year" name="year" required >



                       <option value="">Select year</option>

                      @foreach($pays as $pay)

                       <option value="{{ $pay->year }}">{{ $pay->year }}</option>

                       @endforeach

                     </select>

                    </div>

                    <div class="form-group">

                    <label for="month" class="control-label">Month</label>

                     <select class="form-control" id="month" name="month" required >

                       <option value="">Select month</option>

                    @foreach($pays as $pay)

                       <option value="{{ $pay->month }}">{{ $pay->month }}</option>

                       @endforeach

                     </select>

                    </div>


                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




