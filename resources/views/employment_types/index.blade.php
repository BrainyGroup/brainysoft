@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.employment type') }}<span class="pull-right"> <a href="/employment_types/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
          

  @if(count ($employment_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
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
        @foreach($employment_types as $employment_type)

                    <tr>

                      <td>{{ $employment_type->name }}</td>

                      <td>{{ $employment_type->description }}</td>

                      <td><a href="/employment_types/{{$employment_type->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this kin type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$employment_type->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['KinTypeController@destroy',$employment_type->id],'method' => 'DELETE','id' => $employment_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Kin types defined

          <a class="pull-right" href="/employment_types/create">{{ __('messages.add')}}</a>

        @endif



        </div>
    </div>
</div>    
@endsection



