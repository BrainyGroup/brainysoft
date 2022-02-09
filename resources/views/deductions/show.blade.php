@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ $deduction->name  }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
<div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered">

                    <caption><h1></h1></caption>



                      <tbody>



                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $deduction->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $deduction->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $deduction->description }}</td>

                    </tr>

                    <tr>
                          <td>
                             @can('deduction-edit')
                            <a href="/deductions/{{$deduction->id}}/edit">{{ __('messages.edit') }}</a></td>
                            @endcan
                          <td>
                             @can('deduction-delete')
                            <a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.deduction')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$deduction->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\DeductionController@destroy',$deduction->id],'method' => 'DELETE','id' => $deduction->id]) !!}
                            @endcan
                              {!! Form::close() !!}
                          </td>

                      </tr>



                                          </tr>




                              </tbody>
                            </table>
                        </div>
        </div>
    </div>
</div>    
@endsection


