@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $organization->name  }}</div>

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

                          <td>{{ $organization->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $organization->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $organization->description }}</td>

                    </tr>

                    <tr>
                          <td>
                            @can('organization-edit')
                            <a href="/organizations/{{$organization->id}}/edit">{{ __('messages.edit') }}</a>
                           @endcan
                          </td>

                          <td>
                            @can('organization-delete')
                            <a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.organization')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$organization->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\OrganizationController@destroy',$organization->id],'method' => 'DELETE','id' => $organization->id]) !!}

                              {!! Form::close() !!}
                              @endcan
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



