@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.department') }} <span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/departments/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

@if(count ($departments) > 0)
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
        @foreach($departments as $department)

                    <tr>

                      <td>{{ $department->name }}</td>

                      <td>{{ $department->description }}</td>

                      <td><a href="/departments/{{$department->id}}/edit">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this department?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$department->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\DepartmentController@destroy',$department->id],'method' => 'DELETE','id' => $department->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Department defined

          <a class="pull-right" href="/departments/create">{{ __('messages.add')}}</a>


        @endif



        </div>
    </div>
</div>    
@endsection


