@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header"><h1>{{ __('Register') }}</h1></div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf


              <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="country_id" class="col-md-4 col-form-label text-md-right">Select your country</label>

                    <div class="col-md-6">

                        <select class="form-control" id="country_id" name="country_id">

                            <option value="">Select your country</option>

                                

                                    <option value="1">Tanzania</option>
                                     <option value="2">Kenya</option>

                               

                        </select>

                    </div>

                 </div>


                 <div class="form-group row">
                    <label for="employee" class="col-md-4 col-form-label text-md-right">{{ __('Number of Employee') }}</label>

                    <div class="col-md-6">
                        <input id="employee" type="text" class="form-control{{ $errors->has('employee') ? ' is-invalid' : '' }}" name="employee" value="{{ old('employee') }}" required autofocus>

                        @if ($errors->has('employee'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('employee') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


               

                  <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                    <div class="col-md-6">
                        <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}" required autofocus>

                        @if ($errors->has('company_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                  <div class="form-group row">
                    <label for="company_description" class="col-md-4 col-form-label text-md-right">{{ __('Company Description') }}</label>

                    <div class="col-md-6">
                        <input id="company_description" type="text" class="form-control{{ $errors->has('company_description') ? ' is-invalid' : '' }}" name="company_description" value="{{ old('company_description') }}" required autofocus>

                        @if ($errors->has('company_description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('company_description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
