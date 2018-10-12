@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.company') }}</div>

        <div class="card-body">
            @if( $company )
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                <caption></caption>


                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                     

                    </tr>
                  </thead>
                  <tbody>
      

                    <tr>

                      <td>{{ $company->name }}</td>

                      <td>{{ $company->description }}</td>

                      <td><a href="/companies/{{$company->id}}/edit">Edit</a></td>

                      
                    </tr>


         

        </tbody>
      </table>
  </div>

        @else

          No Companies defined

          <a class="pull-right" href="/companies/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection

