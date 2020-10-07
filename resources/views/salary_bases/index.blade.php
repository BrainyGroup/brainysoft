@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.salary_type') }} <span class="pull-right"> <a href="/salary_bases/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        @if(count ($salary_bases) > 0)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                    <caption></caption>

                  <thead>
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>

                    </tr>
                  </thead>
                  <tbody>
        @foreach($salary_bases as $salary_base)

                    <tr>

                      <td>{{ $salary_base->name }}</td>

                      <td>{{ $salary_base->description }}</td>

                      <td><a href="/salary_bases/{{$salary_base->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this salary base?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$salary_base->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Payroll\SalaryBaseController@destroy',$salary_base->id],'method' => 'DELETE','id' => $salary_base->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Salary type defined

          <a class="pull-right" href="/salary_types/create">{{ __('messages.add')}}</a>


        @endif
                </div>
    </div>
</div>    
@endsection



