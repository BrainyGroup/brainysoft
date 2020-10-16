@extends('layouts.app')


@section('content')
<div class="col-md-12">

              <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('messages.earning monthly') }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">TZS <count-up :to="{{ $monthly_net }}"></count-up></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('messages.earning annually') }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">TZS <count-up :to="{{$annual_net}}"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ __('messages.tasks') }}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">80%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('messages.pending request') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
    <div class="card">
        <div class="card-header font-weight-bold text-primary">{{ __('messages.monthly pay') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
 <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">

                          
                            
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                          <span class="h5 mb-0 font-weight-bold text-gray-800"> <count-up :to="{{ $monthly_total }}"></count-up></span>
                                        </div>
                                        <div class="desc">{{ __('messages.salary') }}</div>
                                    </div>
                                </a>
                            </div>

                            {{-- <div class="col-lg-1 col-md-1 col-sm-1"></div> --}}

                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                              <a class="dashboard-stat dashboard-stat-v2 yellow" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="h5 mb-0 font-weight-bold text-gray-800"> <count-up :to="{{ $monthly_statutory }}"></count-up> </span> 
                                        </div>
                                        <div class="desc"> {{ __('messages.statutory') }} </div>
                                    </div>
                                </a>
                            </div>

                            {{-- <div class="col-lg-1 col-md-1 col-sm-1"></div> --}}
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="h5 mb-0 font-weight-bold text-gray-800" > <count-up :to="{{ $monthly_paye }}"></count-up></span>
                                        </div>
                                        <div class="desc"> {{ __('messages.paye') }} </div>
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="col-lg-1 col-md-1 col-sm-1"></div> --}}
                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            {{-- <span data-counter="counterup" data-value="89"></span>% </div> --}}
                                            <span class="h5 mb-0 font-weight-bold text-gray-800"> <count-up :to="{{ $monthly_deduction }}"></count-up></span>
                                         </div>
                                        <div class="desc"> {{ __('messages.deduction') }} </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->


                        <div class="row">

                                  {{-- <canvas id="graph"></canvas> --}}
       
           
               <graph-line :labels="['{{ __('messages.january') }}', '{{ __('messages.february') }}', '{{ __('messages.march') }}', '{{ __('messages.april') }}', '{{ __('messages.may') }}', '{{ __('messages.june') }}', '{{ __('messages.july') }}', '{{ __('messages.august') }}','{{ __('messages.september') }}','{{ __('messages.october') }}','{{ __('messages.november') }}','{{ __('messages.december') }}']"
                         
               :values="[{{implode(',', $value)}}]"
               :color="'#5DADE2'"
               :type="'line'"
               :legend="'{{ __('messages.monthly gloss') }}'"
               ></graph-line>

                        </div>

<!-- BEGIN DASHBOARD STATS 1-->

    
           
        </div>

        <div class="card">
          <div class="card-header font-weight-bold text-primary">Monthly Pay</div>
  
          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif


        <div class="row">

          {{--  <span class="counter">1,234,567.00</span> --}}
       
   
       
               <graph-line :labels="[{{ $year - 4}}, {{ $year - 3}}, {{ $year - 2}},{{ $year - 1}},{{ $year}}]"
                           :values="[{{implode(',', $yearly_pay)}}]"
                           :color="'#5DADE2'"                          
                           :borderColor="'red'"
                           :borderWidth="2"
                           :type="'bar'"
                           :legend="'{{ __('messages.yearly pay') }}'"
               ></graph-line>
       
       {{--         <data-table
             fetch-url="{{ route('users.table') }}"
             :columns="['company id','title','name','gender','married','email','firstname','middlename','lastname','photo','dod','employee','created','updated']"
           ></data-table>   --}}
        </div>
          </div>
       </div> 
    </div>
</div>  









@endsection


