@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.organization') }} <span class="pull-right"> 
         @can('organization-create')  
          <a class="btn btn-secondary btn-sm"  href="/organizations/create">{{ __('messages.add') }}</a>
        @endcan
        </span></div>

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

                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>                
                      <th scope="col">{{ __('messages.statutory type') }}</th>
                      <th scope="col">{{ __('messages.bank') }}</th>
                      <th scope="col">{{ __('messages.account#') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

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

                      <td>
                        @can('organization-edit')
                        <a href="/organizations/{{$organization->id}}/edit">{{ __('messages.edit') }}</a>
                      @endcan
                      </td>

                      <td>
                        @can('organization-delete')
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this organization?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$organization->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\OrganizationController@destroy',$organization->id],'method' => 'DELETE','id' => $organization->id]) !!}

                          {!! Form::close() !!}
                          @endcan
                      </td>




                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          {{ __('messages.no organization defined')}} 
          @can('organization-create')

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/organizations/create">{{ __('messages.add')}}</a>

@endcan
        @endif
        </div>
    </div>
</div>    
@endsection


