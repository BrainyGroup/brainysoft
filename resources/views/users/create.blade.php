@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.user')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

          

          

              {!! Form::open(['action' => 'Payroll\UserController@store','files' => true, 'method' => 'POST']) !!}

            <div class="form-group">

                    <label for="title" class="control-label">{{__('messages.title')}} </label>

                     <select class="form-control" id="title" name="title">

                       <option value="">{{__('messages.select title')}} </option>

                       <option value="Mr.">{{__('messages.mr')}} </option>
                       <option value="Mrs.">{{__('messages.mrs')}} </option>
                       <option value="Miss">{{__('messages.miss')}} </option>                      

                     </select>

                    </div>


            {{ Form::bsText('firstname', '',['placeholder' => __('messages.first name'), 'label' => __('messages.first name')]) }}

            {{ Form::bsText('middlename', '',['placeholder' => __('messages.middle name'), 'label' => __('messages.middle name')]) }}

            {{ Form::bsText('lastname', '',['placeholder' => __('messages.last name'), 'label' => __('messages.last name')]) }}


               {{ Form::bsText('name', '',['placeholder' => __('messages.name'), 'label' => __('messages.name')]) }}


               {{ Form::bsText('national_id', '',['placeholder' => __('messages.national identification number'), 'label' => __('messages.national identification number')]) }}




            {{ Form::bsText('email', '',['placeholder' => __('messages.email'), 'label' => __('messages.email')]) }}

                            <div class="form-group">
                    <label for="password" class="control-label">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                 
                </div>



                <div class="form-group">
                    <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>

                  
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  
                </div>           
                   

        

                <div class="form-group">

                    <label for="sex" class="control-label">{{__('messages.gender')}} </label>

                     <select class="form-control" id="sex" name="sex">                  

                      <option value="">{{__('messages.select gender')}} </option>            
                  

                       <option value="1">{{__('messages.male')}} </option>

                       <option value="0">{{__('messages.female')}} </option>
                                         

                     </select>

                  </div>


               <div class="form-group">

                    <label for="maritalstatus" class="control-label">{{__('messages.marital status')}} </label>

                     <select class="form-control" id="maritalstatus" name="maritalstatus">

                     

                      <option value=""> {{__('messages.select marital status')}} 


                      </option>	

                      

                       <option value="1">{{__('messages.married')}} </option>

                       <option value="0">{{__('messages.single')}} </option>
                                         

                     </select>

                  </div>

                  <div class="form-group">

                    <label for="role" class="control-label">{{__('messages.role')}} </label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="role" name="role_id">

                       <option value="3">{{__('messages.employee')}} </option>

                       @foreach($roles as $role)

                       <option value="{{ $role->id }}">{{ $role->name }}</option>

                       @endforeach

                     </select>

                      
                    </div>

                    </div>





            

            {{ Form::bsDate('dob', '',['placeholder' => __('messages.date of birth'), 'label' => __('messages.date of birth')]) }}

            {{ Form::bsText('mobile', '',['placeholder' => __('messages.mobile'), 'label' => __('messages.mobile')]) }}

            

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







