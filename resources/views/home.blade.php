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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><count-up :to="9000"></count-up></div>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
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
        <div class="card-header font-weight-bold text-primary">Monthly Pay</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
 <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">

                          
                            
                            <div class="border border-primary col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="counter">1349</span>
                                        </div>
                                        <div class="desc"> Salary </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1"></div>
                            <div class="border border-primary col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="label-danger" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div>
                                            <span class="counter">12,5 </span> M$ </div>
                                        <div class="desc"> Net </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1"></div>
                            <div class="border border-primary col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="counter">
                                            <span class="counter" >299</span>
                                        </div>
                                        <div class="desc"> Paye </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1"></div>
                            <div class="border border-primary col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                    <div class="visual">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="details">
                                        <div class="counter"> +
                                            <span data-counter="counterup" data-value="89"></span>% </div>
                                        <div class="desc"> SDL </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->

            <span class="counter">1,234,567.00</span>

            <canvas id="graph"></canvas>

            <div id="ap">
                <graph-line :labels="['January', 'February', 'March', 'April', 'May', 'June', 'July']"
                            :values="[0, 10, 5, 2, 20, 30, 45]"
                            :color="'red'"
                            :type="'line'"
                            ></graph-line>

                            <graph-line :labels="['January', 'February', 'March']"
                            :values="[0, 10, 5]"
                            :color="'green'"
                            :type="'bar'"
                            ></graph-line>
        

            </div>
            


   
    







       
           
        </div>
       


        


        


    </div>
</div>  



<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

<script type="text/javascript" src="/js/app.js"></script>



@endsection
