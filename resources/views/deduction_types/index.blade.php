@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.deduction_type') }}<span class="pull-right"> <a href="/deduction_types/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
            @if($deduction_types)
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
        @foreach($deduction_types as $deduction_type)

                    <tr>



                      <td>{{ $deduction_type->name }}</td>

                      <td>{{ $deduction_type->description }}</td>

                      <td><a href="/deduction_types/{{$deduction_type->id}}/edit">Edit</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this deduction type?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$deduction_type->id}}).submit();
                            }">Delete
                          </a>

                          {!! Form::open(['action' => ['Payroll\DeductionTypeController@destroy',$deduction_type->id],'method' => 'DELETE','id' => $deduction_type->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Deduction type defined

          <a class="pull-right" href="/deduction_types/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection






