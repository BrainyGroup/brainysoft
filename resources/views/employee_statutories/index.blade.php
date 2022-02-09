@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.statutory') }}<span class="pull-right"> 
          @can('employee_statutory-create') 
              <a class="btn btn-secondary btn-sm" href="/employee_statutories/create?employee_id={{ $employee->id }}">{{ __('messages.add') }}</a>
          @endcan
            </span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count ($statutories) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                <caption></caption>


                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>

                      <th scope="col">{{ __('messages.description') }}</th>

                      <th scope="col">{{ __('messages.organization') }}</th>

                      <th scope="col">{{ __('messages.employee') }}</th>

                      <th scope="col">{{ __('messages.employer') }}</th>

                      <th scope="col">{{ __('messages.due date') }}</th>

                      <th scope="col">{{ __('messages.statutory type') }}</th>

                      <th scope="col">{{ __('messages.number') }}</th>

                      <th scope="col">{{ __('messages.salary base') }}</th>

                      <th scope="col">{{ __('messages.edit') }}</th>

                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutories as $statutory)

                    <tr>

                      <td>{{ $statutory->name }}</td>

                      <td>{{ $statutory->description }}</td>

                      <td>{{ $statutory->organization_name }}</td>

                      <td>{{ $statutory->employee }}</td>

                      <td>{{ $statutory->employer }}</td>

                      <td>{{ $statutory->date_required }}</td>

                      <td>{{ $statutory->statutory_type_name }}</td>

                      <td>{{ $statutory->employee_statutory_no }}</td>

                      <td>{{ $statutory->salary_base }}</td>

              @if($statutory->selection == 1)

              <td>
                @can('employee_statutory-edit') 
                <a href="/employee_statutories/{{$statutory->employee_statutory_id}}/edit">{{ __('messages.edit') }}</a>
              @endcan
              </td>
                
                      <td>
                         @can('employee_statutory-delete') 
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory->employee_statutory_id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\EmployeeStatutoryController@destroy',$statutory->employee_statutory_id],'method' => 'DELETE','id' => $statutory->employee_statutory_id]) !!}
                          @endcan
                          {!! Form::close() !!}
                      </td>
              @else
              <td>{{ __('messages.edit') }}</td>


                <td>{{ __('messages.delete') }}</td>

              @endif




                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Statutories defined

           @can('employee_statutory-create') 

          <a class="pull-right" href="/statutories/create">{{ __('messages.add')}}</a>

          @endcan


        @endif


        </div>
    </div>
</div>    
@endsection