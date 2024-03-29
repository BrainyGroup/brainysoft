@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.kin_type') }}<span class="pull-right"> 
          @can('kin_type-create')
            <a class="btn btn-secondary btn-sm"  href="/kin_types/create">{{ __('messages.add') }}</a>
        @endcan
          </span></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

  @if(count ($kin_types) > 0)
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
        @foreach($kin_types as $kin_type)

                    <tr>

                      <td>{{ $kin_type->name }}</td>

                      <td>{{ $kin_type->description }}</td>

                      <td>
                        @can('kin_type-edit')
                          <a href="/kin_types/{{$kin_type->id}}/edit">{{ __('messages.edit') }}</a>
                        @endcan
                      </td>

                      <td>
                        @can('kin_type-delete')
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this kin type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$kin_type->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\KinTypeController@destroy',$kin_type->id],'method' => 'DELETE','id' => $kin_type->id]) !!}
                        @endcan
                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

        {{ __('messages.no kin type defined')}}
        
         @can('kin_type-create')

          <a class="pull-right" class="btn btn-secondary btn-sm" href="/kin_types/create">{{ __('messages.add')}}</a>

        @endcan

        @endif



        </div>
    </div>
</div>    
@endsection



