@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.statutory') }}<span class="pull-right"> <a href="/statutories/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count ($statutories) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                <caption></caption>


                  <thead>
                    <tr>

                      <th scope="col">Name</th>

                      <th scope="col">Description</th>

                      <th scope="col">Organization</th>

                      <th scope="col">Employee</th>

                      <th scope="col">Employer</th>

                      <th scope="col">Due date</th>

                      <th scope="col">Statutory type</th>

                      <th scope="col">Salary base</th>

                      <th scope="col">Edit</th>

                      <th scope="col">Delete</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutories as $statutory)

                    <tr>

                      <td>{{ $statutory->name }}</td>

                      <td>{{ $statutory->description }}</td>

                      <td>{{ $statutory->organization_name }}</td>

                      <td>{{ $statutory->employee }}</td>

                      <td>{{ $statutory->employer }}</td>

                      <td>{{ $statutory->date_required }}</td>

                      <td>{{ $statutory->statutory_type_name }}</td>

                      <td>{{ $statutory->salary_base }}</td>

                      <td><a href="/statutories/{{$statutory->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['StatutoryController@destroy',$statutory->id],'method' => 'DELETE','id' => $statutory->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Statutories defined

          <a class="pull-right" href="/statutories/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection