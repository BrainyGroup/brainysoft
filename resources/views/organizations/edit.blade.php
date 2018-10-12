@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Organization</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 {!! Form::open(['action' => array('OrganizationController@update', $organization->id),'method' => 'PUT']) !!}

                    {{ Form::bsText('name', $organization->name ,['placeholder' => 'Enter organization name', 'required' => 'true']) }}

                    {{ Form::bsText('description', $organization->description,['placeholder' => 'Enter organization description']) }}

                    <div class="form-group">

                    <label for="bank" class="control-label">Bank</label>

                     <select class="form-control" id="bank" name="bank_id">

                       <option value="{{ $current_bank->id }}">{{ $current_bank->name }}</option>

                       @foreach($banks as $bank)

                       <option value="{{ $bank->id }}">{{ $bank->name }}</option>

                       @endforeach

                     </select>

                    </div>


                      {{ Form::bsText('account_number', $organization->account_number,['placeholder' => 'Enter account number']) }}


                    <div class="form-group">

                    <label for="statutory_type" class="control-label">Statutory Type</label>

                     <select class="form-control" id="statutory_type" name="statutory_type_id">

                       <option value="{{ $current_statutory_type->id }}">{{ $current_statutory_type->name}}</option>

                       @foreach($statutory_types as $statutory_type)

                       <option value="{{ $statutory_type->id }}">{{ $statutory_type->name }}</option>

                       @endforeach

                     </select>

                    </div>


                    {{ Form::bsSubmit( __('messages.edit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection




