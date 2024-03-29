@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.deduction') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count($employees_deductions)>0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>                  
                      <th scope="col">{{ __('messages.amount') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>

        @foreach($employees_deductions as $deduction)

        @if( $deduction->balance > 0)

                    <tr>

                      <th scope="row">{{ $deduction->user_id }}</th>

                      <td><a href="/deductions/create?employee_id={{$deduction->employee_id}}">{{ $deduction->title.'. '.$deduction->firstname.' '.$deduction->middlename.' '.$deduction->lastname }}</a></td>

                        <td>{{ $deduction->deduction_name }}  </td>

                        <td class = "text-right">{{ $deduction->balance }}  </td>

            

                      
                      <td>
                         @can('deduction-edit')
                        <a href="/deductions/{{$deduction->id}}/edit?user_id={{$deduction->user_id}}">{{ __('messages.edit') }}</a></td>
                        @endcan
                      <td>
                         @can('deduction-delete')
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this deduction?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$deduction->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Payroll\DeductionController@destroy',$deduction->id],'method' => 'DELETE','id' => $deduction->id]) !!}
                        @endcan
                          {!! Form::close() !!}
                      </td>


                    </tr>

                      @else

                      <tr>

                      <th scope="row">{{ $deduction->user_id }}</th>

                      <td><a href="/deductions/create?employee_id={{$deduction->employee_id}}">{{ $deduction->title.'. '.$deduction->firstname.' '.$deduction->middlename.' '.$deduction->lastname }}</a></td>

                        <td> </td>

                        <td class = "text-right"></td>

                   

                   

                      
                      <td><a href="/deductions/{{$deduction->id}}/edit?user_id={{$deduction->user_id}}">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this deduction?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$deduction->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\DeductionController@destroy',$deduction->id],'method' => 'DELETE','id' => $deduction->id]) !!}

                          {!! Form::close() !!}
                      </td>


                    </tr>

                      @endif







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





