@extends('layouts.master')

@section('title', 'Countries List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($countries)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                <caption><h1>{{ __('messages.country') }}</h1> <span class="pull-right"> <a href="/countries/create">{{ __('messages.add') }}</span></caption>


                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($countries as $country)

                    <tr>

                      <td>{{ $country->name }}</td>

                      <td><a href="/countries/{{$country->id}}/edit">Edit</a></td>

                      <td><a href=""
                    			onclick="
                    			var result = confirm('Are you sure yo want to delete this country?');
                    			if (result){
                    					event.preventDefault();
                    					document.getElementById({{$country->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['CountryController@destroy',$country->id],'method' => 'DELETE','id' => $country->id]) !!}

                          {!! Form::close() !!}
                      </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Country defined

          <a class="pull-right" href="/countries/create">{{ __('messages.add')}}</a>


        @endif



        </div>
    </div>
</div>
@endsection
