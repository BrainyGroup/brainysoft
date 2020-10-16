@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $center->name  }}</div>

        <div class="card-body">
            <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption></caption>

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
                          <td><a href="/centers/{{$center->id}}/edit"><i class="fa fa-paint-brush text-secondary" aria-hidden="true"></i></a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.center')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$center->id}}).submit();
                                }"><i class="fa fa-trash text-secondary" aria-hidden="true"></i>
                              </a>

                              {!! Form::open(['action' => ['Payroll\CenterController@destroy',$center->id],'method' => 'DELETE','id' => $center->id]) !!}

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


