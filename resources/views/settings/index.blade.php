@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Settings</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


             <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">

            
                  <caption><h1></h1></caption>


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
                      <td><a href="/employment_types">Employment types</a></td>
                      <td><a href="/pay_types">Pay types</a></td>
                      <td><a href="/payroll_groups">Payroll Groups</a></td>
                    </tr>

                    

                    <tr>
                      <td><a href="/statutory_types">Statutory types</a></td>
                      <td><a href="/statutories">Statutories</a></td>
                      <td><a href="/countries">Countries</a></td>
                    </tr>

                    <tr>
                      <td><a href="/basic_settings">Basic settings</a></td>
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




