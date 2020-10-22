@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.add allowance for') }} {{ $user->title.'. '.$user->firstname.' '.$user->lastname }}</div>

        <div class="card-body">
            {!! Form::open(['action' => 'Payroll\AllowanceController@store','method' => 'POST']) !!}

                    {{ Form::bsText('allowance_amount','',['placeholder' => __('messages.allowance amount'), 'label' => __('messages.allowance amount')]) }} 

                    {{ Form::bsHidden('user_id', request('user_id')) }}   

                    <div class="form-group">

                    <label for="allowance_name" class="control-label">{{__('messages.name')}}</label>

                     <select class="form-control" id="allowance_name" name="allowance_type_id">

                     <option value="">{{__('messages.select allowance type')}}</option>

                       @foreach($allowance_types as $allowance_type)

                       <option value="{{ $allowance_type->id }}">{{ $allowance_type->name }}</option>

                       @endforeach

                     </select>

                    </div>



                    {{ Form::bsDate(__('messages.start_date')) }}

                    {{ Form::bsDate(__('messages.end_date')) }}

                    {{ Form::bsSubmit(__('messages.submit'),['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}

        </div>
    </div>
</div>    
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


          <script type="text/javascript">
            var path = "{{ route('allow_typ_auto') }}";
            $('input.typeahead').typeahead({              
                source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                    });
                }
            });
        </script>

