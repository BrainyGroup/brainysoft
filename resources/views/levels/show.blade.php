@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header"><h1>{{ $level->name  }}</h1></div>

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

                          <td>{{ $level->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $level->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $level->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/levels/{{$level->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.level')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$level->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\LevelController@destroy',$level->id],'method' => 'DELETE','id' => $level->id]) !!}

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



