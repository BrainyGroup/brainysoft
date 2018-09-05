@extends('layouts.master')

@section('title', 'Organization')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($organizations) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Organization</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Statutory Type</th>
                      <th scope="col">Organization</th>
                      <th scope="col">Account #</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($organizations as $organization)

                    <tr>

                      <td>{{ $organization->name }}</td>

                      <td>{{ $organization->description }}</td>

                      <td>{{ $organization->statutory_name }}</td>

                      <td>{{ $organization->bank_name }}</td>

                      <td>{{ $organization->account_number }}</td>

                      <td><a href="/organizations/{{$organization->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this organization?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$organization->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['OrganizationController@destroy',$organization->id],'method' => 'DELETE','id' => $organization->id]) !!}

                          {!! Form::close() !!}
                      </td>




                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Organization defined

        @endif



        </div>
    </div>
</div>
@endsection
