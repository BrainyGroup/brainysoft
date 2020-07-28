@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
      
        <div class="card-header"> Users
          <span class="pull-right"> <a class="btn btn-secondary btn-sm"href="/users/create">{{ __('messages.add') }} new user </a></span>

        </div>

        

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if(count ($users) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm" id="sample_1">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Marital status</th>

                      <th scope="col">Email</th>
                      <th scope="col">Mobile</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
        @foreach($users as $user)

                    <tr>

                      <td>{{ $user->id }}</td>

                      <td>{{ $user->title.'. '.$user->firstname.' '.$user->middlename.' '.$user->lastname }}</td>

                      @if($user->sex == 1)
                      <td>Male</td>
                      @else
                      <td>Male</td>
                      @endif

                      
                      @if($user->maritalstatus == 1)
                      <td>Married</td>
                      @else
                      <td>Not Married</td>
                      @endif

                      <td>{{ $user->email }}</td>

                      <td>{{ $user->mobile }}</td>


                      <td><a href="/employees/create?user_id={{ $user->id }}"> <i class="fa fa-paper-plane text-secondary" aria-hidden="true"></i></a></td>

                      <td><a href="/users/{{$user->id}}/edit"><i class="fa fa-paint-brush text-secondary" aria-hidden="true"></i></a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this user?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$user->id}}).submit();
                            }"><i class="fa fa-trash text-secondary" aria-hidden="true"></i>
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

          <a class="pull-right" href="/users/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection





