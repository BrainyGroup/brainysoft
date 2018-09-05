@extends('layouts.master')

@section('title', 'Companies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if($companies)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Companies</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($companies as $company)

                    <tr>

                      <td>{{ $company->name }}</td>

                      <td>{{ $company->description }}</td>

                      <td><a href="/companies/{{$company->id}}/edit">Edit</a></td>

                      <td><a href=""
                    			onclick="
                    			var result = confirm('Are you sure yo want to delete this company?');
                    			if (result){
                    					event.preventDefault();
                    					document.getElementById({{$company->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['CompanyController@destroy',$company->id],'method' => 'DELETE','id' => $company->id]) !!}

                          {!! Form::close() !!}
                      </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Companies defined

        @endif



        </div>
    </div>
</div>
@endsection
