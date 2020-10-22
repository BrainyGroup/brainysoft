@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.designation') }}<span class="pull-right"> <a class="btn btn-secondary btn-sm"  href="/designations/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        @if( count($designations) > 0)
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
        @foreach($designations as $designation)

                    <tr>

                      <td>{{ $designation->name }}</td>

                      <td>{{ $designation->description }}</td>

                      <td><a href="/designations/{{$designation->id}}/edit">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this designation?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$designation->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\DesignationController@destroy',$designation->id],'method' => 'DELETE','id' => $designation->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Designation defined

          <a class="pull-right" href="/designations/create">{{ __('messages.add')}}</a>


        @endif


        </div>
    </div>
</div>    
@endsection



