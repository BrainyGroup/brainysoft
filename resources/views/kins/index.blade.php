@extends('layouts.master')

@section('title', 'Kin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">


        @if(count ($kins) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption><h1>Next of Kins</h1></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($kins as $kin)

                    <tr>

                      <td>{{ $kin->name }}</td>

                      <td>{{ $kin->description }}</td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Next of kins defined

          <a class="pull-right" href="/kins/create">{{ __('messages.add')}}</a>


        @endif



        </div>
    </div>
</div>
@endsection
