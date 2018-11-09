@extends('layouts.app')



@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Employee Details</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            
            
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col"> <img class="user_avatar" src="{{ asset('/storage/user_profile_photos/'.$employee->photo)}}">
</th>
                     
                      

                    </tr>
                  </thead>
                  <tbody>
    

                    <tr>

                     <td>Full Name</td>
                      

                      <td>{{ $employee->title.'. '.$employee->firstname.' '.$employee->middlename.' '.$employee->lastname }}</td>

                      
<td></td>
                    
                    </tr>

                    <tr>
                        <td>Identity</td>
                        <td><a href="/employees/{employee}">{{ $employee->identity }}  </a></td>
                        <td></td>
                    </tr>

                     <tr>
                        <td>Age</td>
                        <td>{{ \Carbon\Carbon::parse($employee->dob)->diffInYears(\Carbon\Carbon::now()) . ' years' }}</td>
                        <td></td>
                    </tr>

                    <tr>
                    <td>Employment Type</td>
                          <td>{{ $employee->employment_type_name}}</td>
                          <td></td>
                    </tr>

                    <tr>
                        <td>Start Date</td>
                        <td>{{ $employee->start_date}}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Expected Retire Date</td>
                        <td>{{ $employee->end_date}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Payroll group</td>
                          <td>{{ $employee->payroll_group_name }}</td> 
                          <td></td>
                    </tr>

                    <tr>
                    <td>Schedule</td>
                          <td>{{ $employee->pay_base_name}}</td>
                          <td></td>
                    </tr>

                     <tr>
                        <td>Pay Center</td>
                          <td>{{ $employee->center_name}}</td>
                          <td></td>
                    </tr>

                    <tr>

                        <td>Structure level</td>
                          <td>{{ $employee->level_description }}</td>
                          <td></td>
                    </tr>
                <td>Salary Scale</td>
                          <td>{{ $employee->scale_description.' ('.$employee->scale_name.')' }}</td>
                          <td></td>
                    </tr>

                    <tr>
                        <td>Designation</td>
                          <td>{{ $employee->designation_description.' ('.$employee->designation_name.')' }}</td>
                          <td></td>
                    </tr>

                    <tr>
                        <td>Department</td>
                          <td>{{ $employee->department_name}}</td>
                          <td></td>
                    </tr>

                                       <tr>
                        <td>Bank</td>
                          <td>{{ $employee->bank_name}}</td>
                          <td>{{ $employee->account_number}}</td>
                    </tr>

                    <tr>
                        <td>Mobile</td>
                        <td>{{ $employee->mobile }}</td>
                        <td></td>
                    </tr>

                   <tr>
                    <td>Salary</td>
                     <td>{{ number_format($employee->salary, 2 )}}</td>
                     <td></td>
                    </tr>

                   <tr>
                    <td>Allowance</td>
                    <td></td>
                    </tr>
                @foreach($allowance_types as $allowance_type)
                    <tr>
                        <td></td>
                    <td>{{  $allowance_type->allowance_name }}</td>
            <td><a href="/allowances">{{  number_format($allowance_type->allowance_amount, 2) }}</a></td>
            
                    </tr>
                @endforeach
                   <tr>
                    
                    <td>Deduction</td><td></td>
                    </tr>
                @foreach($deduction_types as $deduction_type)
                    <tr>
                        <td></td>
                    <td>{{  $deduction_type->deduction_name }}</td>
            <td><a href="/allowances">{{  number_format($deduction_type->deduction_amount, 2) }}</a></td>
            
                    </tr>
                @endforeach
                 <tr>
                    
                    <td>Next of kin</td><td></td><td></td>
                    </tr>
                @if(count($kins)>0)

                   @foreach($kins as $kin)
                    <tr>
                    <td></td>
            <td>{{ $kin->name . ' ('. $kin->kin_type_name . ')' }}</td>
            <td>{{ $kin->mobile }}</td>
                    </tr>
                @endforeach
                @else
                 <tr>
                    
                    <td>No next of kins</td><td></td>
                    </tr>
                @endif


               

                   <tr>
                    <td>Statutories</td><td></td>

                  <td></td>

                    </tr>
                     @if(count($statutories)>0)

                   @foreach($statutories as $statutory)
                    <tr>
                        <td></td>
                    <td>{{  $statutory->name }}</td>
            <td>{{ $statutory->description }}</td>
            
                    </tr>
                @endforeach
                @else
                 <tr>
                    
                    <td>No statutories defined</td><td></td>
                    </tr>
                @endif
                     





                     

               

                   

                   

                   
                    <tr>
                        <td>Created at</td>
                          <td>{{ $employee->created_at}}</td>
                          <td></td>
                    </tr>

                     <tr>
                        <td>Updated at</td>
                          <td>{{ $employee->updated_at}}</td>
                          <td></td>
                    </tr>

         

        </tbody>
      </table>
  </div>
        </div>
    </div>
</div>    
@endsection
