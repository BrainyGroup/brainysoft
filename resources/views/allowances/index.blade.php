@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.allowance') }} </div>

        <div class="card-body">
            @if( count($employees_allowances) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                <caption></caption>


                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">{{ __('messages.employee name') }}</th>
                      <th scope="col">{{ __('messages.allowance name') }}</th>
                      <th scope="col">{{ __('messages.amount') }}</th>
                      <th scope="col">{{ __('messages.start date') }}</th>
                      <th scope="col">{{ __('messages.end date') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>


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

                      <td><a href="/allowances/{{$allowance->id}}/edit?user_id={{$allowance->user_id}}"><i class="fa fa-paint-brush text-secondary" aria-hidden="true"></i></a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.allowance')}}');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$allowance->id}}).submit();
                            }"><i class="fa fa-trash text-secondary" aria-hidden="true"></i>
                          </a>

                          {!! Form::open(['action' => ['Payroll\AllowanceController@destroy',$allowance->id],'method' => 'DELETE','id' => $allowance->id]) !!}

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

     