@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.statutory_type') }} <span class="pull-right"> <a class="btn btn-secondary btn-sm" href="/statutory_types/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count ($statutory_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
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
        @foreach($statutory_types as $statutory_type)

                    <tr>

                      <td>{{ $statutory_type->name }}</td>

                      <td>{{ $statutory_type->description }}</td>

                      <td><a href="/statutory_types/{{$statutory_type->id}}/edit">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory_type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory_type->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\StatutoryTypeController@destroy',$statutory_type->id],'method' => 'DELETE','id' => $statutory_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          {{ __('messages.no statutory type defined')}} 

          <a class="pull-right" href="/statutory_types/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection





