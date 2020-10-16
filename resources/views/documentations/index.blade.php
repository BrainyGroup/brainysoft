@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.documentations') }} </div>

        <div class="card-body">

          <div class="row">

            <div class="col-md-2">            
              @include('layouts.nav_doc')
            </div>

          <div class="col-md-10">
            <p></p>
            @foreach($documentations as $documentation)
            {!! $documentation->description !!}}
            @endforeach
            <a href="/documentations/{{$documentation->id}}/edit">Edit</a>
            
          </div>

          </div>

        </div>


         
    </div>




        </div>
    </div>
</div> 

  
@endsection

     