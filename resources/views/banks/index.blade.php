@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.bank') }} <span class="pull-right"> 
          @can('bank-create')  
     
             <a href="/banks/create"  class="btn btn-secondary btn-sm">{{ __('messages.add') }}</a></span></div>

          @endcan
        <div class="card-body">
            @if( count($banks) > 0 )
      <div class="table-responsive">


              <table class="table table-hover table-striped table-bordered table-sm">
                  <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($banks as $bank)

                    <tr>




                      <td><a href="/banks/{{$bank->id}}">{{ $bank->name }}</a></td>

                      <td><a href="/banks/{{$bank->id}}">{{ $bank->description}}</a></td>

                      <td>
                      @can('bank-edit') 
                        <a href="/banks/{{$bank->id}}/edit"><i class="fa fa-paint-brush text-secondary" aria-hidden="true"></i></a>
                      @endcan
                      </td>



                    <td>
                      @can('bank-delete') 
                      <a href=""
                        onclick="
                        var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.bank')}}');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$bank->id}}).submit();
                          }"><i class="fa fa-trash text-secondary" aria-hidden="true"></i>
                        </a>

                        {!! Form::open(['action' => ['Payroll\BankController@destroy',$bank->id],'method' => 'DELETE','id' => $bank->id]) !!}
                      @endcan
                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No bank defined

          @can('bank-create')     

            <a class="pull-right" href="/banks/create">{{ __('messages.add')}}</a>

          @endcan


        @endif
        </div>
    </div>
</div>    
@endsection

