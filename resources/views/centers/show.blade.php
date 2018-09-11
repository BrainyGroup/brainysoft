@extends('layouts.master')

@section('header')



@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1>{{ $center->name  }}</h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $center->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $center->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $center->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/centers/{{$center->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                        			onclick="
                        			var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.center')}}');
                        			if (result){
                        					event.preventDefault();
                        					document.getElementById({{$center->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['CenterController@destroy',$center->id],'method' => 'DELETE','id' => $center->id]) !!}

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
