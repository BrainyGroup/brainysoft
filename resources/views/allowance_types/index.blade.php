@extends('layouts.master')

@section('title', 'Allowance types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-6">


        @if(count($allowance_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>{{ __('messages.allowance_type') }}</h1> <span class="pull-right"> <a href="/allowance_types/create">{{ __('messages.add') }}</span></caption>

                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($allowance_types as $allowance_type)

                    <tr>


                      <td>{{ $allowance_type->name }}</td>

                    <td>{{  $allowance_type->description }}</td>

                    <td><a href="/allowance_types/{{$allowance_type->id}}/edit">{{ __('messages.edit') }}</a></td>

                    <td><a href=""
                        onclick="
                        var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.allowance_type')}}');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$allowance_type->id}}).submit();
                          }">{{ __('messages.delete') }}
                        </a>

                        {!! Form::open(['action' => ['AllowanceTypeController@destroy',$allowance_type->id],'method' => 'DELETE','id' => $allowance_type->id]) !!}

                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Allowance types defined

          <a class="pull-right" href="/allowance_types/create">{{ __('messages.add')}}</a>


        @endif



        </div>
    </div>
</div>
@endsection
