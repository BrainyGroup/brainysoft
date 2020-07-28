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

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption><span>{{ $company->name }}</span></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
   
                    <tr>

                      <td>{{ $pay->id }}</td>

                      <td>{{ $pay->id }}</td>

                      <td></td>

                     



                    </tr>




        </tbody>
      </table>
  </div>


        <p>******************************************************************</p>
        <h1>Salary Slip</h1>
        <p>******************************************************************</p>
        <p>{{$pay->company_id}}</p>

        <p>company logo</p>

        <p>company_address</p>

        <p>{{$pay->employee_id}}</p>

        <p>employee_number</p>

        <p>employee_center</p>

        <p>payment_mode</p>

        <p>designation</p>

        <p>employee_scale</p>

        <p>******************************************************************</p>

        <p>Payments</p>

        <p>******************************************************************</p>

        <p>Basic Salary:...............{{number_format($pay->basic_salary, 2)}}</p>

        <p>SSF:.........................{{number_format(($pay->gloss - $pay->taxable), 2)}}</p>

        <p>Allowance:..................{{number_format($pay->allowance, 2)}}</p>

        <p>Gross:.......................{{number_format($pay->gloss, 2)}}</p>

        <p>Taxable Earning:.............{{number_format($pay->taxable,2)}}</p>

        <p>Paye:........................{{number_format($pay->paye, 2)}}</p>

        <p>Deduction:...................{{number_format($pay->deduction, 2)}}</p>

        <p>Net Earning:.................{{number_format($pay->net, 2)}}</p>

        <p>******************************************************************</p>



</div>
        </div>
    </div>
  </body>
</html>
