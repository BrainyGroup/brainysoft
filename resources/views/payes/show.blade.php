@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $paye->name  }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $paye->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $paye->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $paye->description }}</td>

                    </tr>

                    <tr>
                          <td>
                            @can('paye-edit') 
                            <a href="/payes/{{$paye->id}}/edit">{{ __('messages.edit') }}</a>
                            @endcan
                          </td>

                          <td>
                            @can('paye-delete') 
                            <a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.paye')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$paye->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\PayeController@destroy',$paye->id],'method' => 'DELETE','id' => $paye->id]) !!}

                              {!! Form::close() !!}
                            @endcan
                          </td>

                      </tr>



                                          </tr>




                              </tbody>
                            </table>
                        </div>


        </div>
    </div>
</div>    
@endsection


