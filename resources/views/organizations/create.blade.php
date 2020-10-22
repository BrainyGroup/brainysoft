@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.organization')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                   {!! Form::open(['action' => 'Payroll\OrganizationController@store','method' => 'POST']) !!}

                    {{ Form::bsText('name','',['placeholder' => __('messages.organization name'), 'label' => __('messages.name'), 'required' => 'true']) }}

                    {{ Form::bsText('description','',['placeholder' => __('messages.organization description'), 'label' => __('messages.description')]) }}

                    <div class="form-group">

                    <label for="bank" class="control-label">{{__('messages.bank')}}</label>

                     <select class="form-control" id="bank" name="bank_id">

                     <option value="">{{__('messages.select bank')}}</option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                    </div>


                      {{ Form::bsText('account_number','',['placeholder' =>  __('messages.account number'), 'label' => __('messages.account number')]) }}


                    <div class="form-group">

                    <label for="statutory_type" class="control-label">{{__('messages.statutory type')}}</label>

                     <select class="form-control" id="statutory_type" name="statutory_type_id">

                       <option value="">{{__('messages.select statutory type')}}</option>

                       @foreach($statutory_types as $statutory_type)

                       <option value="{{ $statutory_type->id }}">{{ $statutory_type->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    {{ Form::bsSubmit( __('messages.add'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection





