@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.statutory') }}<span class="pull-right"> <a href="/employee_statutories/create?employee_id={{ $employee->id }}">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count ($statutories) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                <caption></caption>


                  <thead>
                    <tr>

                      <th scope="col">Name</th>

                      <th scope="col">Description</th>

                      <th scope="col">Organization</th>

                      <th scope="col">Employee</th>

                      <th scope="col">Employer</th>

                      <th scope="col">Due date</th>

                      <th scope="col">Statutory type</th>

                      <th scope="col">Salary base</th>



                      <th scope="col">Delete</th>



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

                      <td>{{ $statutory->salary_base }}</td>

              @if($statutory->selection == 1)

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory->employee_statutory_id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['EmployeeStatutoryController@destroy',$statutory->employee_statutory_id],'method' => 'DELETE','id' => $statutory->employee_statutory_id]) !!}

                          {!! Form::close() !!}
                      </td>
              @else


                <td>delete</td>

              @endif




                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Statutories defined

          <a class="pull-right" href="/statutories/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection