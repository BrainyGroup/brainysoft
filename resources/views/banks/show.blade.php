@extends('layouts.master')

@section('header')



@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1>{{ $bank->name  }}</h1></caption>



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
                          <td><a href="/banks/{{$bank->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                        			onclick="
                        			var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.bank')}}');
                        			if (result){
                        					event.preventDefault();
                        					document.getElementById({{$bank->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['BankController@destroy',$bank->id],'method' => 'DELETE','id' => $bank->id]) !!}

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
