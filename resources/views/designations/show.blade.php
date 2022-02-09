@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $designation->name  }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $designation->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $designation->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $designation->description }}</td>

                    </tr>

                    <tr>
                          <td>
                            @can('designation-edit') 
                                <a href="/designations/{{$designation->id}}/edit">{{ __('messages.edit') }}</a>
                            @endcan
                              </td>

                          <td>
                          @can('designation-delete') 
                            <a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.designation')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$designation->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\DesignationController@destroy',$designation->id],'method' => 'DELETE','id' => $designation->id]) !!}
                           @endcan
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




@extends('layouts.master')

@section('header')



@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">






                              </div>
                          </div>
                      </div>
                      @endsection
