@extends('layouts.master')

@section('header')

<div class="blog-header">
  <h1>All Employee</h1>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if($employees)
          @foreach($employees as $employee)

            {{ $employee->user_id }}

          @endforeach

        @else

          No Employee

        @endif



        </div>
    </div>
</div>
@endsection
