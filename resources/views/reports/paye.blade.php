@extends('layouts.app')
 @section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <span><h1>P.A.Y.E. - DETAILS OF PAYMENT OF TAX WITHHELD</h1></span>
           
         </div>
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($pays) > 0)
       <div class="table-responsive">
               <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                    <span></span>
                   <thead>
            
                    <tr>
                       <th scope="col" >S/NO</th>

                       <th scope="col" >TIN NUMBER</th>
                   
                       <th >NAME OF EMPLOYEE</th>  
                                
                       <th scope="col">PAYROLL NO</th>
                       <th scope="col">POSTAL ADDRESS</th>
                       <th scope="col">POSTAL CITY</th>
                       <th scope="col">BASIC PAY</th>
                       <th scope="col">HOUSING</th>
                       <th scope="col">ALLOWANCE & BENEFIT</th>
                       <th scope="col">GROSS PAY</th>
                       <th scope="col">DEDUCTIONS</th>  
                       <th scope="col">TAXABLE AMOUNT</th>
                       <th scope="col">TAX DUE</th>
                     
      
                     </tr>
                  </thead>
                  <tbody>
                    
        
        @foreach($pays as $key => $pay)
          
                     <tr>
                       <td>{{$key + 1 }}</td>
                       <td>{{ $pay->tin}}</td>

                       <td >{{ $pay->title.'. '.$pay->firstname.' '.$pay->middlename.' '.$pay->lastname }}</td>  
                               
                       <td>{{ $pay->pay_number}}</td>
                        <td>{{ ($pay->mobile) }}</td>
                         <td>{{ ($pay->mobile) }}</td>
                       <td>{{ number_format($pay->basic_salary,2) }}</td>
                       <td>{{ number_format($pay->allowance,2) }}</td>
                       <td>{{ number_format($pay->allowance,2) }}</td>
                       <td>{{ number_format($pay->gloss,2) }}</td>
                        <td>{{ number_format($pay->deduction,2) }}</td>
                       <td>{{ number_format($pay->taxable,2) }}</td>
                       <td>{{ number_format($pay->paye,2) }}</td>
                       
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
