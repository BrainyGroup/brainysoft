@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h2>All Employee</h2></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if( count($employees) > 0 )
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Id</th>
                      <th scope="col">TIN Number</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">salary</th>
                      <th scope="col">Allowance</th>
                      <th scope="col">Deduction</th>
                      <th scope="col">Kin</th>
                      <th scope="col">Statutory</th>
                      <th scope="col">Details</th>

                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($employees as $employee)

                    <tr>
                      <th scope="row">{{ $employee->user_id }}</th>

                      <td>{{ $employee->title.'. '.$employee->firstname.' '.$employee->middlename.' '.$employee->lastname }}</td>

                      <td><a href="/employees/{{ $employee->id}}">{{ $employee->identity }}  </a></td>

                      <td>{{ $employee->tin }}</td>

                      <td>{{ $employee->designation }}</td>

                      <td>{{ $employee->mobile }}</td>

                      <td>{{ number_format($employee->salary, 2) }}</td>

                    <td><a href="/allowances">{{  number_format($employee->allowance_amount, 2) }}</a></td>

                    <td><a href="/deductions">{{  number_format($employee->deduction_amount, 2) }}</a></td>

                    <td><a href="/kins?employee_id={{ $employee->id }}">Kins</a></td>

                    <td><a href="/employee_statutories?employee_id={{ $employee->id }}">Statutories</a></td>

                    <td><a href="/employees/{{ $employee->id}}">Details</a></td>




                    <td><a href="/employees/{{$employee->id}}/edit">Edit</a></td>

                    <td><a href=""
                        onclick="
                        var result = confirm('Are you sure yo want to delete this employee?');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$employee->id}}).submit();
                          }">Delete
                        </a>

                        {!! Form::open(['action' => ['Payroll\EmployeeController@destroy',$employee->id],'method' => 'DELETE','id' => $employee->id]) !!}

                        {!! Form::close() !!}
                    </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Employee defined

          <a class="pull-right" href="/employees/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection
