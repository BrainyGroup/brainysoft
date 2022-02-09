@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $user->name  }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

<div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered table-sm">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $user->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $user->name }}</td>

                        </tr>

                        <tr>

                          <td>Roles</td>

                          <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                          </td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $user->description }}</td>

                    </tr>

                    <tr>
                          <td>
                             @can('user-edit')
                            <a href="/users/{{$user->id}}/edit">{{ __('messages.edit') }}</a></td>
                            @endcan
                          <td>

                             @can('user-delete')
                            
                            <a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.user')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$user->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\UserController@destroy',$user->id],'method' => 'DELETE','id' => $user->id]) !!}
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
