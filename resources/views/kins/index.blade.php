@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.kin') }} <span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/kins/create?employee_id={{ request('employee_id')}}">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 @if(count ($kins) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">{{ __('messages.employee') }}</th>
                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.mobile') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($kins as $kin)

                    <tr>

                        <td>{{ $kin->firstname. ' ' . $kin->lastname }}</td>

                      <td>{{ $kin->name }}</td>

                      <td>{{ $kin->kin_type_name }}</td>

                      <td>{{ $kin->mobile }}</td>

                      <td><a href="/kins/{{$kin->id}}/edit">{{ __('messages.edit') }}</a></td>
                      

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this kin?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$kin->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\KinController@destroy',$kin->id],'method' => 'DELETE','id' => $kin->id]) !!}

                          {!! Form::close() !!}



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no kin defined')}}  

          <a class="pull-right" href="/kins/create?employee_id={{ request('employee_id') }}">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection


