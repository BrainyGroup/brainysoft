@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h2>{{ __('messages.country') }}</h2> <span class="pull-right"> 
          @can('country-create')
          <a class="btn btn-secondary btn-sm"  href="/countries/create">{{ __('messages.add') }}</a>
          @endcan
        </span></div>

        <div class="card-body">
           @if($countries)
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered table-sm">
                <caption></caption>


                  <thead>
                    <tr>


                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>
                      <th scope="col">{{ __('messages.country code') }}</th>
                      <th scope="col">{{ __('messages.currency code') }}</th>
                      <th scope="col">{{ __('messages.currency name') }}</th>
                      <th scope="col">{{ __('messages.language code') }}</th>
                      <th scope="col">{{ __('messages.language name') }}</th>
                      <th scope="col">{{ __('messages.capital city') }}</th>
                      <th scope="col">{{ __('messages.system users') }}</th>
                      <th scope="col">{{ __('messages.employees') }}</th>            
                      <th scope="col">{{ __('messages.details') }}</th>
                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>


                    </tr>
                  </thead>
                  <tbody>
        @foreach($countries as $country)

                    <tr>

                      <td>{{ $country->name }}</td>
                      <td>{{ $country->description }}</td>
                      <td>{{ $country->country_code }}</td>
                       <td>{{ $country->currency_code }}</td>
                      <td>{{ $country->currency_name }}</td>
                      <td>{{ $country->language_code }}</td>
                      <td>{{ $country->language }}</td>
                      <td>{{ $country->capital }}</td>
                      <td>{{ $country->system_users }}</td>
                      <td>{{ $country->employees }}</td>                     
                      <td><a href="/countries/{{$country->id}}">{{ __('messages.details') }}</a></td>
                      <td>
                        @can('country-edit')
                        <a href="/countries/{{$country->id}}/edit">{{ __('messages.edit') }}</a>
                      @endcan
                      </td>


                      <td>
                        @can('country-delete')
                        <a href=""
                          onclick="
                          var result = confirm('Are you sure yo want to delete this country?');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$country->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['Payroll\CountryController@destroy',$country->id],'method' => 'DELETE','id' => $country->id]) !!}
                        @endcan
                          {!! Form::close() !!}
                      </td>

                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No Country defined

          <a class="pull-right" href="/countries/create">{{ __('messages.add')}}</a>


        @endif
        </div>
    </div>
</div>    
@endsection


