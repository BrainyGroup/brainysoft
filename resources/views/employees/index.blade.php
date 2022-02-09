@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h2>{{ __('messages.employees') }}</h2></div>

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

                      <th scope="col">{{ __('messages.name') }}</th>

                      <th scope="col">{{ __('messages.id') }}</th>

                      <th scope="col">{{ __('messages.tin') }}</th>

                      <th scope="col">{{ __('messages.designation') }}</th>

                      <th scope="col">{{ __('messages.mobile') }}</th>

                      <th scope="col">{{ __('messages.salary') }}</th>

                      <th scope="col">{{ __('messages.allowance') }}</th>

                      <th scope="col">{{ __('messages.deduction') }}</th>

                      <th scope="col">{{ __('messages.kin') }}</th>

                      <th scope="col">{{ __('messages.statutory') }}</th>

                      <th scope="col">{{ __('messages.details') }}</th>

                      <th scope="col">{{ __('messages.edit') }}</th>

                      <th scope="col">{{ __('messages.delete') }}</th>

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

                    <td><a href="/kins?employee_id={{ $employee->id }}">{{ __('messages.kins') }}</a></td>

                    <td><a href="/employee_statutories?employee_id={{ $employee->id }}">{{ __('messages.statutory') }}</a></td>

                    <td><a href="/employees/{{ $employee->id}}">{{ __('messages.details') }}</a></td>




                    <td>

                     @can('employee-edit') 
                      
                      <a href="/employees/{{$employee->id}}/edit">{{ __('messages.edit') }}</a>
                      
                    @endcan
                    </td>
                     
                    <td>
                      @can('employee-delete') 
                      <a href=""
                        onclick="
                        var result = confirm('Are you sure yo want to delete this employee?');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$employee->id}}).submit();
                          }">{{ __('messages.delete') }}
                        </a>

                        {!! Form::open(['action' => ['Payroll\EmployeeController@destroy',$employee->id],'method' => 'DELETE','id' => $employee->id]) !!}
                      @endcan
                        {!! Form::close() !!}
                    </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no employee defined')}}    
        
         @can('employee-create') 

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/users">{{ __('messages.add')}}</a>
        @endcan

        @endif


        </div>
    </div>
</div>    
@endsection
