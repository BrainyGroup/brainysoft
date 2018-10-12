@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.statutory_type') }} <span class="pull-right"> <a href="/statutory_types/create">{{ __('messages.add') }}</a></span></div>

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

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutory_types as $statutory_type)

                    <tr>

                      <td>{{ $statutory_type->name }}</td>

                      <td>{{ $statutory_type->description }}</td>

                      <td><a href="/statutory_types/{{$statutory_type->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory_type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory_type->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['StatutoryTypeController@destroy',$statutory_type->id],'method' => 'DELETE','id' => $statutory_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Statutory type defined

          <a class="pull-right" href="/statutory_types/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection





