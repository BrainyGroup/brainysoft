@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $company->name  }}</div>

        <div class="card-body">
           <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $company->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $company->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $company->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/companys/{{$company->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.company')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$company->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\CompanyController@destroy',$company->id],'method' => 'DELETE','id' => $company->id]) !!}

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



