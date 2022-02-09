@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.documentation') }} </div>

        <div class="card-body">

          <div class="row">

            <div class="col-md-2">            
              @include('layouts.nav_doc')
            </div>

          <div class="col-md-10">
              <p></p>
            @if(isset($documentation->description))
            
            {!! $documentation->description !!}} 
            
             @can('documentation-edit') 

               <a href="/documentations/{{$documentation->id}}/edit">Edit</a>

            @endcan

            @endif
            
          </div>

          </div>

        </div>


         
    </div>




        </div>
    </div>
</div> 

  
@endsection


