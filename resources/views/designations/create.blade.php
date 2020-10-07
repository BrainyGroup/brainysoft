@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Add Designation</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                    {!! Form::open(['action' => 'Payroll\DesignationController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => 'Enter designation name']) }}

                    {{ Form::bsText('description','',['placeholder' => 'Enter designation description']) }}

                    <div class="form-group">

                    <label for="Levels" class="control-label">Levels</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="level" name="level_id">

                       <option value="">Select employee level</option>

                       @foreach($levels as $level)

                       <option value="{{ $level->id }}">{{ $level->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addLevel">Add</button>
                      </div>

                    </div>

                    </div>

                    <div class="form-group">

                    <label for="Scales" class="control-label">Scales</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="scale" name="scale_id">

                       <option value="">Select salary scale</option>

                       @foreach($scales as $scale)

                       <option value="{{ $scale->id }}">{{ $scale->name }}</option>

                       @endforeach

                     </select>

                      

                    </div>

                    </div>

                    {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
 @include('layouts.model')
        </div>
    </div>
</div>    
@endsection










