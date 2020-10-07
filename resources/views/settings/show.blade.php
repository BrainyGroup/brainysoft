@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="table-responsive">

                  <table class="table table-hover table-striped table-bordered table-sm">

                    <caption><h1>{{ $setting->name  }}</h1></caption>

                      <tbody>

                        <tr>

                          <td>{{ __('messages.number') }}</td>

                          <td>{{ $setting->number }}</td>

                        </tr>

                        <tr>

                          <td>{{ __('messages.name') }}</td>

                          <td>{{ $setting->name }}</td>

                        </tr>

                          <tr>

                          <td>{{ __('messages.description') }}</td>

                          <td>{{ $setting->description }}</td>

                    </tr>

                    <tr>
                          <td><a href="/settings/{{$setting->id}}/edit">{{ __('messages.edit') }}</a></td>

                          <td><a href=""
                              onclick="
                              var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.setting')}}');
                              if (result){
                                  event.preventDefault();
                                  document.getElementById({{$setting->id}}).submit();
                                }">{{ __('messages.delete') }}
                              </a>

                              {!! Form::open(['action' => ['Payroll\SettingController@destroy',$setting->id],'method' => 'DELETE','id' => $setting->id]) !!}

                              {!! Form::close() !!}
                          </td>
                      </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection







