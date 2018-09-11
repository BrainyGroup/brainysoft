@extends('layouts.master')

@section('title', 'Employee List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if( count($employees) > 0 )
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>All Employee</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Id</th>
                      <th scope="col">Designation</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">salary</th>
                      <th scope="col">Allowance</th>
                      <th scope="col">Deduction</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($employees as $employee)

                    <tr>
                      <th scope="row">{{ $employee->user_id }}</th>

                      <td>{{ $employee->title.'. '.$employee->firstname.' '.$employee->middlename.' '.$employee->lastname }}</td>

                      <td><a href="/employees/{employee}">{{ $employee->identity }}  </a></td>

                      <td>{{ $employee->designation }}</td>

                      <td>{{ $employee->mobile }}</td>

                      <td>{{ number_format($employee->salary, 2) }}</td>

                    <td><a href="/allowances">{{  number_format($employee->allowance_amount, 2) }}</a></td>

                    <td><a href="/deductions">{{  number_format($employee->deduction_amount, 2) }}</a></td>

                    <td><a href="/employees/{{$employee->id}}/edit">Edit</a></td>

                    <td><a href=""
                        onclick="
                        var result = confirm('Are you sure yo want to delete this employee?');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$employee->id}}).submit();
                          }">Delete
                        </a>

                        {!! Form::open(['action' => ['EmployeeController@destroy',$employee->id],'method' => 'DELETE','id' => $employee->id]) !!}

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
