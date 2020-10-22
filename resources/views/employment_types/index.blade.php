@extends('layouts.app')

@section('title')
{{ __('messages.employment type') }}
@endsection 

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.employment type') }}<span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/employment_types/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
          

  @if(count ($employment_types) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($employment_types as $employment_type)

                    <tr>

                      <td>{{ $employment_type->name }}</td>

                      <td>{{ $employment_type->description }}</td>

                      <td><a href="/employment_types/{{$employment_type->id}}/edit">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this employee type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$employment_type->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\EmploymentTypeController@destroy',$employment_type->id],'method' => 'DELETE','id' => $employment_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no level defined')}}  

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/employment_types/create">{{ __('messages.add')}}</a>

        @endif



        </div>
    </div>
</div>    
@endsection



