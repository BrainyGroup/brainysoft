@extends('layouts.app')

@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">{{ __('messages.role') }} <span class="pull-right"> 
          @can('role-create')
             <a class="btn btn-secondary btn-sm" href="/roles/create">{{ __('messages.add') }}</a>
          @endcan

        </span></div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card-body">
            @if( count($roles) > 0 )
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
        @foreach($roles as $role)

                    <tr>

                      <td><a href="/roles/{{$role->id}}">{{ $role->name }}</a></td>

                      <td><a href="/roles/{{$role->id}}">{{ $role->description}}</a></td>

                      <td>
                        @can('role-delete')
                        <a href="/roles/{{$role->id}}/edit">{{ __('messages.edit') }}</a>
                       @endcan
                      </td>

                    <td>
                      @can('role-delete')
                      <a href=""
                        onclick="
                        var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.role')}}');
                        if (result){
                            event.preventDefault();
                            document.getElementById({{$role->id}}).submit();
                          }">{{ __('messages.delete') }}
                        </a>

                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
                        

                        {!! Form::open(['action' => ['Payroll\RoleController@destroy',$role->id],'method' => 'DELETE','id' => $role->id]) !!}
                      @endcan
                        {!! Form::close() !!}
                    </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          {{ __('messages.no role defined')}}

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/roles/create">{{ __('messages.add')}}</a>


        @endif
        </div>
    </div>
</div>    
@endsection

