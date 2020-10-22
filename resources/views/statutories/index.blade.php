@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __('messages.statutory') }}<span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/statutories/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if(count ($statutories) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                <caption></caption>


                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>

                      <th scope="col">{{ __('messages.description') }}</th>

                      <th scope="col">{{ __('messages.organization') }}</th>

                      <th scope="col">{{ __('messages.employee') }}</th>

                      <th scope="col">{{ __('messages.employer') }}</th>

                      <th scope="col">{{ __('messages.due date') }}</th>

                      <th scope="col">{{ __('messages.statutory type') }}</th>

                      <th scope="col">{{ __('messages.salary base') }}</th>

                      <th scope="col">{{ __('messages.edit') }}</th>
                      
                      <th scope="col">{{ __('messages.delete') }}</th>



                    </tr>
                  </thead>
                  <tbody>
        @foreach($statutories as $statutory)

                    <tr>

                      <td>{{ $statutory->name }}</td>

                      <td>{{ $statutory->description }}</td>

                      <td>{{ $statutory->organization_name }}</td>

                      <td>{{ $statutory->employee }}</td>

                      <td>{{ $statutory->employer }}</td>

                      <td>{{ $statutory->date_required }}</td>

                      <td>{{ $statutory->statutory_type_name }}</td>

                      <td>{{ $statutory->salary_base }}</td>

                      <td><a href="/statutories/{{$statutory->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this statutory?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$statutory->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Payroll\StatutoryController@destroy',$statutory->id],'method' => 'DELETE','id' => $statutory->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          {{ __('messages.no statutory defined')}}  

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/statutories/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection