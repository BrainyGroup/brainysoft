@extends('layouts.master')

@section('title', 'Settings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">



      <div class="table-responsive aligh-center">

              <table class="table table-borderless ">
                  <caption><h1>Settings</h1></caption>


                  <tbody>

                    <tr>
                      <td><a href="/allowance_types">Allowance types</a></td>
                      <td><a href="/banks">Banks</a></td>
                      <td><a href="/centers">Centers</a></td>
                    </tr>

                    <tr>
                      <td><a href="/deduction_types">Deduction types</a></td>
                      <td><a href="/departments">Departments</a></td>
                      <td><a href="/designations">Designations</a></td>
                    </tr>

                    <tr>
                      <td><a href="/kin_types">Kin types</a></td>
                      <td><a href="/levels">Levels</a></td>
                      <td><a href="/organizations">Organizations</a></td>
                    </tr>

                    <tr>
                      <td><a href="/payes">Payes</a></td>
                      <td><a href="/salary_bases">Salary types</a></td>
                      <td><a href="/scales">Scales</a></td>

                    </tr>

                    <tr>
                      <td><a href="/other_settings">Other settings</a></td>
                      <td><a href="/companies">Companies</a></td>
                        <td><a href="/countries">Countries</a></td>

                    </tr>




        </tbody>
      </table>
  </div>





        </div>
    </div>
</div>
@endsection
