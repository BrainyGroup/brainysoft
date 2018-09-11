@extends('layouts.master')

@section('title', 'Kin_types')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($kin_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                    <caption><h1>{{ __('messages.kin_type') }}</h1> <span class="pull-right"> <a href="/kin_types/create">{{ __('messages.add') }}</span></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($kin_types as $kin_type)

                    <tr>

                      <td>{{ $kin_type->name }}</td>

                      <td>{{ $kin_type->description }}</td>

                      <td><a href="/kin_types/{{$kin_type->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this kin type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$kin_type->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Kin_typeController@destroy',$kin_type->id],'method' => 'DELETE','id' => $kin_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Kin types defined

          <a class="pull-right" href="/kin_types/create">{{ __('messages.add')}}</a>

        @endif



        </div>
    </div>
</div>
@endsection
