@extends('layouts.master')

@section('title', 'Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($users) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>{{ $company->name }} Users</h1></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Marital status</th>

                      <th scope="col">Email</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Employee</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
        @foreach($users as $user)

                    <tr>

                      <td>{{ $user->id }}</td>

                      <td>{{ $user->title.'. '.$user->firstname.' '.$user->middlename.' '.$user->lastname }}</td>

                      <td>{{ $user->sex }}</td>

                      <td>{{ $user->email }}</td>

                      <td>{{ $user->mobile }}</td>

                      @if($user->maritalstatus == 1)
                      <td>Married</td>
                      @else
                      <td>Not Married</td>
                      @endif

                      <td><a href="/employees/create?user_id={{ $user->id }}"> Add</a></td>

                      <td><a href="/users/{{$user->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this user?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$user->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['UserController@destroy',$user->id],'method' => 'DELETE','id' => $user->id]) !!}

                          {!! Form::close() !!}
                      </td>
                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Department defined

        @endif



        </div>
    </div>
</div>
@endsection
