@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.designation')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                    {!! Form::open(['action' => 'Payroll\DesignationController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => __('messages.designation name'), 'label' => __('messages.name')]) }}

                    {{ Form::bsText('description','',['placeholder' => __('messages.designation description'), 'label' => __('messages.description')]) }}

                    <div class="form-group">

                    <label for="Levels" class="control-label">{{__('messages.level')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="level" name="level_id">

                       <option value="">{{__('messages.select employee level')}}</option>

                       @foreach($levels as $level)

                       <option value="{{ $level->id }}">{{ $level->name }}</option>

                       @endforeach

                     </select>

                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addLevel">{{__('messages.add')}}</button>
                      </div>

                    </div>

                    </div>

                    <div class="form-group">

                    <label for="Scales" class="control-label">{{__('messages.scales')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="scale" name="scale_id">

                       <option value="">{{__('messages.select salary scale')}}</option>

                       @foreach($scales as $scale)

                       <option value="{{ $scale->id }}">{{ $scale->name }}</option>

                       @endforeach

                     </select>

                      

                    </div>

                    </div>

                    {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
 @include('layouts.model')
        </div>
    </div>
</div>    
@endsection










