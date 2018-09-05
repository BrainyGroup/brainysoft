@extends('layouts.master')

@section('title', 'Banks')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-6">


        @if($banks)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Banks</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($banks as $bank)

                    <tr>


                      <td>{{ $bank->name }}</td>

                    <td>{{  $bank->description }}</td>

                    <td><a href="/banks/{{$bank->id}}/edit">Edit</a></td>

                    <td><a href=""
                        onclick="
                        var result = confirm('Are you sure yo want to delete this bank?');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$bank->id}}).submit();
                          }">Delete
                        </a>

                        {!! Form::open(['action' => ['BankController@destroy',$bank->id],'method' => 'DELETE','id' => $bank->id]) !!}

                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No bank defined

        @endif



        </div>
    </div>
</div>
@endsection
