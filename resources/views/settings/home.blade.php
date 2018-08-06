@extends('layouts.master')

@section('title', 'Settings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">



      <div class="table-responsive aligh-center">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Settings</h1></caption>


                  <tbody>

                    <tr>
                      <td><a href="/allowances">Allowances</a></td>
                      <td><a href="/allowances">Designation</a></td>
                      <td><a href="/allowances">Paye</a></td>
                    </tr>

                    <tr>
                      <td><a href="/allowances_Types">Allowance Types</a></td>
                      <td><a href="/allowances">Kin Types</a></td>
                      <td><a href="/allowances">Salary types</a></td>
                    </tr>

                    <tr>
                      <td><a href="/bankss">Banks</a></td>
                      <td><a href="/allowances">Levels</a></td>
                      <td><a href="/allowances">Scales</a></td>
                    </tr>

                    <tr>
                      <td><a href="/centers">Center</a></td>
                      <td><a href="/allowances">Organization</a></td>
                      <td><a href="/allowances">Statutory Types</a></td>

                    </tr>

                    <tr>
                      <td><a href="/companies">Company</a></td>
                      <td><a href="/allowances">Statutories</a></td>
                        <td><a href="/allowances">Variables</a></td>

                    </tr>




        </tbody>
      </table>
  </div>





        </div>
    </div>
</div>
@endsection
