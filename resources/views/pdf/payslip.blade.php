<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

   

     <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <style type="text/css">

    h1 {
    text-align: center;
    }  
       
    .company {
    font-size: 16px;
    } 

    .amount{
      text-align:right
    }


    </style>
        
    

 

    

   



  </head>
  <body>

  

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">

          <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">                  
         
                  <tbody>

                    <tr>
                      <td colspan="2">***************************************</td>
                      <td></td>
                     
                    </tr>
   
                    <tr>
                      <td colspan="2" class="company"><strong><h1>{{ $pay->company->name }}</h1></strong></td> 
                      <td></td>   
                      
                    </tr>
                    <tr>
                      <td colspan="2">***************************************</td>
                      <td></td>
                     
                    </tr>
                    <tr>
                      <td>P.O.Box</td>
                      <td>{{ $pay->company->pobox }}</td>
                    </tr>

                     
                    <tr>
                      <td>Region</td>
                      <td>{{ $pay->company->region}}</td>
                    </tr>

                     <tr>
                      <td>Date</td>
                      <td>{{ $pay->run_date}}</td>
                    </tr>


                    <tr>
                      <td>Pay #</td>
                      <td>{{$pay->pay_number}}</td>
                     
                    </tr>

                    <tr>
                      <td colspan="2">***************************************</td>
                      <td></td>
                     
                    </tr>

                    <tr>
                      <td>Identity #</td>
                      <td>{{$pay->employee->identity}}</td>
                     
                    </tr>

                    <tr>
                      <td>Name</td>
                      <td>{{$pay->employee->getFullName() }}</td>
                     
                    </tr>

                    <tr>
                      <td>Level</td>
                      <td>{{$pay->employee->designation->level->name}}</td>
                     
                    </tr>

                    <tr>
                      <td>Scale</td>
                      <td>{{$pay->employee->designation->scale->name}}</td>
                     
                    </tr>

                    <tr>
                      <td>Designation</td>
                      <td>{{$pay->employee->designation->name}}</td>
                     
                    </tr>

                    

                    <tr>
                      <td>Center #</td>
                      <td>{{$pay->employee->center->number}}</td>
                     
                    </tr>

                    <tr>
                      <td>Center Name</td>
                      <td>{{$pay->employee->center->name}}</td>
                     
                    </tr>

                    <tr>
                      <td>Department</td>
                      <td>{{$pay->employee->department->name}}</td>
                     
                    </tr>

                    <tr>
                      <td>Bank</td>
                      <td>{{$pay->employee->bank->name}}</td>
                     
                    </tr>

                    <tr>
                      <td>Payroll group</td>
                      <td>{{$pay->employee->designation->scale->payroll_group->name}}</td>
                     
                    </tr>

                    <tr>
                      <td>Employment type</td>
                      <td>{{$pay->employee->designation->scale->employment_type->name}}</td>
                     
                    </tr>

                    <tr>
                      <td colspan="2">***************************************</td>
                      <td></td>
                     
                    </tr>

                    <tr>
                      <td>Basic salary</td>
                      <td class="amount">{{number_format($pay->basic_salary, 2)}}</td>
                     
                    </tr>

                    <tr>
                      <td><strong>Allowances</strong></td>
                      <td></td>
                     
                    </tr>
                    
                     @foreach($pay_allowances as $pay_allowance)
                    <tr>

                      <td>{{ $pay_allowance->name }}</td>
                      <td class="amount">{{number_format($pay_allowance->amount, 2)}}</td>
                     
                    </tr>
                    @endforeach
                    <tr>
                      <td>Gross</td>
                      <td class="amount">{{number_format($pay->gloss, 2)}}</td>
                     
                    </tr>
                    <tr>
                      <td>Taxable pay</td>
                      <td class="amount">{{number_format($pay->taxable,2)}}</td>
                     
                    </tr>
                    <tr>
                      <td><strong>Deductions</strong></td>
                      <td></td>
                     
                    </tr>
                  @foreach($pay_deductions as $pay_deduction)
                     <tr>
                      <td>{{$pay_deduction->name}}</td>
                      <td class="amount">{{$pay_deduction->amount}}</td>
                     
                    </tr>
                    @endforeach
                    <tr>
                      <td>Paye</td>
                      <td class="amount">{{number_format($pay->paye, 2)}}</td>
                     
                    </tr>$pay_statutory_loan
                    <tr>
                      <td>{{$pay_statutory->statutory_name}}</td>
                      <td class="amount">{{number_format($pay_statutory->employee,2)}}</td>                     
                    </tr>
                    <tr>
                      <td>{{$pay_statutory_HI->statutory_name}}</td>
                      <td class="amount">{{number_format($pay_statutory_HI->employee,2)}}</td>                     
                    </tr>


                    <tr>
                      <td>Net pay</td>
                      <td class="amount">{{number_format($pay->net, 2)}}</td>
                     
                    </tr>
                    <tr>
                      <td colspan="2">***************************************</td>
                      <td></td>
                     
                    </tr>
                     <tr>
                      <td>{{$pay_statutory->statutory_name}} Month Contribution</td>
                      <td class="amount">{{number_format($pay_statutory->total,2)}}</td>                     
                    </tr>
                    <tr>
                      <td>{{$pay_statutory->statutory_name}} commulative</td>
                      <td class="amount">{{number_format($pay_ssf_statutory_sum,2)}}</td>
                     
                    </tr>

                  </tbody>
              </table>
  </div>    

 

</div>
        </div>
    </div>
  </body>
</html>
