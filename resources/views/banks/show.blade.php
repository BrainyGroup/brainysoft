@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ $bank->name  }}</div>

        <div class="card-body">
           
          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $bank->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $bank->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $bank->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/banks/{{$bank->id}}/edit"><i class="fa fa-paint-brush text-secondary" aria-hidden="true"></i></a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.bank')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$bank->id}}).submit();
                                }"><i class="fa fa-trash text-secondary" aria-hidden="true"></i>
                              </a>

                              {!! Form::open(['action' => ['Payroll\BankController@destroy',$bank->id],'method' => 'DELETE','id' => $bank->id]) !!}

                              {!! Form::close() !!}
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





                         