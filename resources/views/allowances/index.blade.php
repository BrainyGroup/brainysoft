@extends('layouts.master')

@section('title', 'Employee List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count($employees_allowances)>0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                <caption><h1>{{ __('messages.allowance') }}</h1> </caption>


                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Employee Name</th>
                      <th scope="col">Allowance name</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Start date</th>
                      <th scope="col">End date</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($employees_allowances as $allowance)

                    <tr>

                      <th scope="row">{{ $allowance->employee_id }}</th>

                      <td><a href="/allowances/create?user_id={{$allowance->user_id}}">{{ $allowance->title.'. '.$allowance->firstname.' '.$allowance->middlename.' '.$allowance->lastname }}</a></td>

                      <td>{{ $allowance->allowance_name }}  </td>

                      <td class = "text-right">{{ $allowance->amount }}  </td>

                      <td class = "text-right">{{ $allowance->start_date }}  </td>

                      <td class = "text-right">{{ $allowance->end_date }}  </td>

                      <td><a href="/allowances/{{$allowance->id}}/edit?user_id={{$allowance->user_id}}">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.allowance')}}');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$allowance->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['AllowanceController@destroy',$allowance->id],'method' => 'DELETE','id' => $allowance->id]) !!}

                          {!! Form::close() !!}
                      </td>

                    </tr>

          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Employee

        @endif



        </div>
    </div>
</div>
@endsection
