@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
           
         <span class="pull-right"><h1><strong>P.A.Y.E. - DETAILS OF PAYMENT OF TAX WITHHELD</strong></h1></div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($pays) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered">
                    <caption></caption>
                   <thead>
                    <tr>
                       <th scope="col">S/NO</th>
                       <th scope="col">NAME OF EMPLOYEE</th>               
                       <th scope="col">PAYROLL NO</th>
                       <th scope="col">POSTAL ADDRESS</th>
                       <th scope="col">POSTAL CITY</th>
                       <th scope="col">BASIC PAY</th>
                       <th scope="col">HOUSING</th>
                       <th scope="col">ALLOWANCE AND BENEFIT</th>
                       <th scope="col">GROSS PAY</th>
                       <th scope="col">DEDUCTIONS</th>  
                       <th scope="col">TAXABLE AMOUNT</th>
                       <th scope="col">TAX DUE</th>
                     </tr>
                  </thead>
                  <tbody>
                    
        @foreach($pays as $pay)
          
                     <tr>
                       <td></td>
                       <td>{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>                
                       <td>{{ $pay->pay_number }}</td>
                        <td>{{ $pay->mobile }}</td>
                         <td>{{ $pay->mobile }}</td>
                       <td>{{ $pay->basic_salary }}</td>
                       <td>{{ $pay->allowance }}</td>
                       <td>{{ $pay->allowance }}</td>
                       <td>{{ $pay->gloss }}</td>
                        <td>{{ $pay->deduction }}</td>
                       <td>{{ $pay->taxable }}</td>
                       <td>{{ $pay->paye }}</td>
                       
                     </tr>
                
           @endforeach
         </tbody>
      </table>
  </div>
         @else
           No Earning, run pay now
           <a class="pull-right" href="/pays/create">{{ __('messages.add')}}</a>
         @endif
         </div>
    </div>
</div>    
@endsection
