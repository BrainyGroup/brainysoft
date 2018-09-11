@extends('layouts.master')

@section('title', 'Banks')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-6">


        @if($banks)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>{{ __('messages.bank') }}</h1> <span class="pull-right"> <a href="/banks/create">{{ __('messages.add') }}</span></caption>

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
