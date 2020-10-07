@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header"><h1>{{ $kin_type->name  }}</h1></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

<div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $kin_type->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $kin_type->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $kin_type->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/kin_types/{{$kin_type->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.kin_type')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$kin_type->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\KinTypeController@destroy',$kin_type->id],'method' => 'DELETE','id' => $kin_type->id]) !!}

                              {!! Form::close() !!}
                          </td>

                      </tr>



                                




                              </tbody>
                            </table>
                        </div>
        </div>
    </div>
</div>    
@endsection



