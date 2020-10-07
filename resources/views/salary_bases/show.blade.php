@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
          <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered table-sm">

                    <caption><h1>{{ $salary_base->name  }}</h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $salary_base->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $salary_base->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $salary_base->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/salary_bases/{{$salary_base->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.salary_base')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$salary_base->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\SalaryBaseController@destroy',$salary_base->id],'method' => 'DELETE','id' => $salary_base->id]) !!}

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



