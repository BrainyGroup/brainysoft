<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


         
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                   

                 
                  <tbody>       

                    <tr>
                      <td> <caption><h1>{{ $company->name }}</caption></td>
                      <td>{{ $company->logo }}</td>              
                    </tr>

                    <tr>
                      <td>Tin</td>
                      <td>{{ $company->tin }}</td>              
                    </tr>

                    <tr>
                      <td>Identity No</td>
                      <td>{{ $employee->identity}}</td>              
                    </tr>

                    <tr>
                      <td>Full Name</td>
                      <td>{{$user->title.' '.$user->firstname.' '.$user->lastname}}</td>              
                    </tr>

                    <tr>
                      <td>Designation</td>
                      <td>{{ $designation->name }}</td>              
                    </tr>

                    <tr>
                      <td>Salary Scale</td>
                      <td>{{ $scale->name }}</td>              
                    </tr>

                    <tr>
                      <td>Center number</td>
                      <td>{{ $center->number }}</td>              
                    </tr>

                    <tr>
                      <td>Center name</td>
                      <td>{{ $center->name }}</td>              
                    </tr>

                    <tr>
                      <td colspan="2"><caption>Payment Description</caption></td>
                            
                    </tr>

                    <tr>
                      <td>Basic salary</td>
                      <td class="text-right">{{number_format($pay->basic_salary,2)}}</td>              
                    </tr>

                    <tr>
                      <td>Allowance</td>
                      <td class="text-right">{{number_format($pay->allowance, 2)}}</td>              
                    </tr>

                    <tr>
                      <td>Gross</td>
                      <td class="text-right">{{number_format($pay->gloss, 2)}}</td>              
                    </tr>



                    <tr>
                      <td>Taxable pay</td>
                      <td class="text-right">{{number_format($pay->taxable,2)}}</td>              
                    </tr>


 
                    <tr>
                      <td>Deduction</td>
                      <td class="text-right">{{number_format($pay->deduction, 2)}}</td>              
                    </tr>

                    <tr>
                      <td>PAYE</td>
                      <td class="text-right">{{number_format($pay->paye, 2)}}</td>              
                    </tr>

                    <tr>
                      <td>{{ $statutory->statutory_name}}</td>
                      <td class="text-right">{{number_format($month_statutory->total, 2)}}</td>              
                    </tr>


                   
                    <tr class="">
                      <td>Net Pay</td>
                      <td class="text-right">{{number_format($pay->net, 2)}}</td>              
                    </tr>

                    <tr>
                      <td></td>
                      <td></td>             
                    </tr>


                    <tr>
                      <td>Commulative {{ $statutory->statutory_name}}</td>
                      <td class="text-right">{{number_format($pay_statutories_cummulative, 2)}}</td>              
                    </tr>


     
        </tbody>
      </table>
  </div>





</div>
        </div>
    </div>
  </body>
</html>
