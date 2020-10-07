@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $scale->name  }}</div>

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

                          <td>{{ $scale->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $scale->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $scale->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/scales/{{$scale->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.scale')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$scale->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\ScaleController@destroy',$scale->id],'method' => 'DELETE','id' => $scale->id]) !!}

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




