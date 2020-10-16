@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.organization') }} <span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/organizations/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

 @if(count ($organizations) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Statutory Type</th>
                      <th scope="col">Organization</th>
                      <th scope="col">Account #</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

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

                          {!! Form::open(['action' => ['Payroll\OrganizationController@destroy',$organization->id],'method' => 'DELETE','id' => $organization->id]) !!}

                          {!! Form::close() !!}
                      </td>




                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Organization defined

          <a class="pull-right" href="/organizations/create">{{ __('messages.add')}}</a>


        @endif
        </div>
    </div>
</div>    
@endsection


