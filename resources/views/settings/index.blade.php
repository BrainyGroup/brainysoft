@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.settings') }}</div>

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
                      <td><a href="/allowance_types">{{ __('messages.allowance types') }}</a></td>
                      <td><a href="/banks">{{ __('messages.banks') }}</a></td>
                      <td><a href="/centers">{{ __('messages.centers') }}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/deduction_types">{{ __('messages.deduction types') }}</a></td>
                      <td><a href="/departments">{{ __('messages.departments') }}</a></td>
                      <td><a href="/designations">{{ __('messages.designations') }}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/kin_types">{{ __('messages.kin types') }}</a></td>
                      <td><a href="/levels">{{ __('messages.levels') }}</a></td>
                      <td><a href="/organizations">{{ __('messages.organizations') }}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/payes">{{ __('messages.paye') }}</a></td>
                      <td><a href="/salary_bases">{{ __('messages.salary types') }}</a></td>
                      <td><a href="/scales">{{ __('messages.scales') }}</a></td>

                    </tr>

                    <tr>
                      <td><a href="/employment_types">{{ __('messages.employment types') }}</a></td>
                      <td><a href="/pay_types">{{ __('messages.pay types') }}</a></td>
                      <td><a href="/payroll_groups">{{ __('messages.payroll groups') }}</a></td>
                    </tr>

                    

                    <tr>
                      <td><a href="/statutory_types">{{ __('messages.statutory types') }}</a></td>
                      <td><a href="/statutories">{{ __('messages.statutory') }}</a></td>
                      <td><a href="/roles">{{ __('messages.roles') }}</a></td>
                    </tr>

                    <tr>
                      <td><a href="/basic_settings">{{ __('messages.basic settings') }}</a></td>
                      <td><a href="/companies">{{ __('messages.companies') }}</a></td>
                      <td><a href="/countries">{{ __('messages.countries') }}</a></td>
                    </tr>
        </tbody>
      </table>
  </div>

        </div>
    </div>
</div>    
@endsection




