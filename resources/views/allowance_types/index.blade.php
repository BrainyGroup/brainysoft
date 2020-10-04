@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.allowance_type') }}
          <span class="pull-right"> <a href="/allowance_types/create">{{ __('messages.add') }}</a></span>
        </div>

        <div class="card-body">
                   @if(count($allowance_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">   

                  <thead>
                    <tr>
                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>
                    </tr>
                  </thead>
                  <tbody>
        @foreach($allowance_types as $allowance_type)

                    <tr>


                      <td>{{ $allowance_type->name }}</td>

                    <td>{{  $allowance_type->description }}</td>

                    <td><a href="/allowance_types/{{$allowance_type->id}}/edit">{{ __('messages.edit') }}</a></td>

                    <td><a href=""
                        onclick="
                        var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.allowance_type')}}');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$allowance_type->id}}).submit();
                          }">{{ __('messages.delete') }}
                        </a>

                        {!! Form::open(['action' => ['Payroll\AllowanceTypeController@destroy',$allowance_type->id],'method' => 'DELETE','id' => $allowance_type->id]) !!}

                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Allowance types defined,

          <a class="pull-right" href="/allowance_types/create">please define</a>


        @endif
        </div>
    </div>
</div>    
@endsection





