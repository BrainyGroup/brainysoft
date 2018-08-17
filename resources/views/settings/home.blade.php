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
                      <td><a href="/designations">Designations</a></td>
                      <td><a href="/payes">Payes</a></td>
                    </tr>

                    <tr>
                      <td><a href="/allowance_types">Allowance Types</a></td>
                      <td><a href="/kin_types">Kin Types</a></td>
                      <td><a href="/salary_types">Salary types</a></td>
                    </tr>

                    <tr>
                      <td><a href="/banks">Banks</a></td>
                      <td><a href="/levels">Levels</a></td>
                      <td><a href="/scales">Scales</a></td>
                    </tr>

                    <tr>
                      <td><a href="/centers">Centers</a></td>
                      <td><a href="/organizations">Organizations</a></td>
                      <td><a href="/statutory_types">Statutory Types</a></td>

                    </tr>

                    <tr>
                      <td><a href="/companies">Companies</a></td>
                      <td><a href="/statutories">Statutories</a></td>
                        <td><a href="/variables">Variables</a></td>

                    </tr>




        </tbody>
      </table>
  </div>





        </div>
    </div>
</div>
@endsection
