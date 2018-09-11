@extends('layouts.master')

@section('title', 'Employee List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count($employees_deductions)>0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                    <caption><h1>{{ __('messages.deduction') }}</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Deduction name</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>

        @foreach($employees_deductions as $deduction)

                    <tr>

                      <th scope="row">{{ $deduction->user_id }}</th>

                      <td><a href="/deductions/create?employee_id={{$deduction->employee_id}}">{{ $deduction->title.'. '.$deduction->firstname.' '.$deduction->middlename.' '.$deduction->lastname }}</a></td>

                      <td>{{ $deduction->deduction_name }}  </td>

                      <td class = "text-right">{{ $deduction->amount }}  </td>

                      <td><a href="/deductions/{{$deduction->id}}/edit?user_id={{$deduction->user_id}}">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this deduction?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$deduction->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['DeductionController@destroy',$deduction->id],'method' => 'DELETE','id' => $deduction->id]) !!}

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
