@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h1>{{ __('messages.country') }}</h1> <span class="pull-right"> <a href="/countries/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
           @if($countries)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                <caption></caption>


                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Country code</th>
                      <th scope="col">Currency code</th>
                      <th scope="col">Currency name</th>
                      <th scope="col">Language code</th>
                      <th scope="col">Language name</th>
                      <th scope="col">Capital</th>
                      <th scope="col">System users</th>
                      <th scope="col">Employees</th>            
                      <th scope="col">Details</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($countries as $country)

                    <tr>

                      <td>{{ $country->name }}</td>
                      <td>{{ $country->description }}</td>
                      <td>{{ $country->country_code }}</td>
                       <td>{{ $country->currency_code }}</td>
                      <td>{{ $country->currency_name }}</td>
                      <td>{{ $country->language_code }}</td>
                      <td>{{ $country->language }}</td>
                      <td>{{ $country->capital }}</td>
                      <td>{{ $country->system_users }}</td>
                      <td>{{ $country->employees }}</td>                     
                      <td><a href="/countries/{{$country->id}}">Details</a></td>
                      <td><a href="/countries/{{$country->id}}/edit">Edit</a></td>


                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this country?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$country->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Payroll\CountryController@destroy',$country->id],'method' => 'DELETE','id' => $country->id]) !!}

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


