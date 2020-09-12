@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.bank') }} <span class="pull-right"> <a href="/banks/create">{{ __('messages.add') }}</a></span></div>

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

                      <td><a href="/banks/{{$bank->id}}/edit">{{ __('messages.edit') }}</a></td>



                    <td><a href=""
                        onclick="
                        var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.bank')}}');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$bank->id}}).submit();
                          }">{{ __('messages.delete') }}
                        </a>

                        {!! Form::open(['action' => ['BankController@destroy',$bank->id],'method' => 'DELETE','id' => $bank->id]) !!}

                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No bank defined

          <a class="pull-right" href="/banks/create">{{ __('messages.add')}}</a>


        @endif
        </div>
    </div>
</div>    
@endsection

