@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header"><h1>{{ $department->name  }}</h1></div>

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

                          <td>{{ $department->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $department->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $department->description }}</td>

                    </tr>

                    <tr>
                          <td>
                            @can('department-edit')
                              <a href="/departments/{{$department->id}}/edit">{{ __('messages.edit') }}</a>
                            @endcan
                          </td>

                          <td>
                            @can('department-delete')
                            <a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.department')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$department->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\DepartmentController@destroy',$department->id],'method' => 'DELETE','id' => $department->id]) !!}
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


