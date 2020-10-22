@extends('layouts.app')



@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.employee')}} {{__('messages.details')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            
            
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col"> <img class="user_avatar" src="{{ asset('/storage/user_profile_photos/'.$employee->photo)}}">
</th>
                     
                      

                    </tr>
                  </thead>
                  <tbody>
    

                    <tr>

                     <td>{{__('messages.full name')}}</td>
                      

                      <td>{{ $employee->title.'. '.$employee->firstname.' '.$employee->middlename.' '.$employee->lastname }}</td>

                      
<td></td>
                    
                    </tr>

                    <tr>
                        <td>{{__('messages.identity')}}</td>
                        <td>{{ $employee->identity }}  </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>{{__('messages.tin number')}}</td>
                        <td>{{ $employee->tin }}  </td>
                        <td></td>
                    </tr>


                     <tr>
                        <td>{{__('messages.age')}}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->dob)->diffInYears(\Carbon\Carbon::now()) . ' years' }}</td>
                        <td></td>
                    </tr>

                    <tr>
                    <td>{{__('messages.employment type')}}</td>
                          <td>{{ $employee->employment_type_name}}</td>
                          <td></td>
                    </tr>

                    <tr>
                        <td>{{__('messages.start date')}}</td>
                        <td>{{ $employee->start_date}}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>{{__('messages.expected retire date')}}</td>
                        <td>{{ $employee->end_date}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{__('messages.payroll group')}}</td>
                          <td>{{ $employee->payroll_group_name }}</td> 
                          <td></td>
                    </tr>

                    <tr>
                    <td>{{__('messages.schedule')}}</td>
                          <td>{{ $employee->pay_base_name}}</td>
                          <td></td>
                    </tr>

                     <tr>
                        <td>{{__('messages.pay center')}}</td>
                          <td>{{ $employee->center_name}}</td>
                          <td></td>
                    </tr>

                    <tr>

                        <td>{{__('messages.structure level')}}</td>
                          <td>{{ $employee->level_description }}</td>
                          <td></td>
                    </tr>
                    <tr>
                <td>{{__('messages.salary scale')}}</td>
                          <td>{{ $employee->scale_description.' ('.$employee->scale_name.')' }}</td>
                          <td></td>
                    </tr>

                    <tr>
                        <td>{{__('messages.designation')}}</td>
                          <td>{{ $employee->designation_description.' ('.$employee->designation_name.')' }}</td>
                          <td></td>
                    </tr>

                    <tr>
                        <td>{{__('messages.department')}}</td>
                          <td>{{ $employee->department_name}}</td>
                          <td></td>
                    </tr>

                                       <tr>
                        <td>{{__('messages.bank')}}</td>
                          <td>{{ $employee->bank_name}}</td>
                          <td>{{ $employee->account_number}}</td>
                    </tr>

                    <tr>
                        <td>{{__('messages.mobile')}}</td>
                        <td>{{ $employee->mobile }}</td>
                        <td></td>
                    </tr>

                   <tr>
                    <td>{{__('messages.salary')}}</td>
                     <td>{{ number_format($employee->salary, 2 )}}</td>
                     <td></td>
                    </tr>

                   <tr>
                    <td>{{__('messages.allowance')}}</td>
                    <td></td><td></td>
                    </tr>
                @foreach($allowance_types as $allowance_type)
                    <tr>
                        <td></td>
                    <td>{{  $allowance_type->allowance_name }}</td>
            <td><a href="/allowances">{{  number_format($allowance_type->allowance_amount, 2) }}</a></td>
            
                    </tr>
                @endforeach
                   <tr>
                    
                    <td>{{__('messages.deduction')}}</td><td></td><td></td>
                    </tr>
                @foreach($deduction_types as $deduction_type)
                    <tr>
                        <td></td>
                    <td>{{  $deduction_type->deduction_name }}</td>
            <td><a href="/allowances">{{  number_format($deduction_type->deduction_amount, 2) }}</a></td>
            
                    </tr>
                @endforeach
                 <tr>
                    
                    <td>{{__('messages.next of kin')}}</td><td></td><td></td>
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
                    
                    <td>{{__('messages.no next of kin')}}</td><td></td><td></td>
                    </tr>
                @endif


               

                   <tr>
                    <td>{{__('messages.statutory')}}</td><td></td>

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
                    
                    <td>{{__('messages.no statutory defined')}}</td><td></td>
                    </tr>
                @endif
                     





                     

               

                   

                   

                   
                    <tr>
                        <td>{{__('messages.created at')}}</td>
                          <td>{{ $employee->created_at}}</td>
                          <td></td>
                    </tr>

                     <tr>
                        <td>{{__('messages.updated at')}}</td>
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
