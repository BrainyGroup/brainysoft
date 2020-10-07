@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Users</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

          

          

              {!! Form::open(['action' => 'Payroll\UserController@store','files' => true, 'method' => 'POST']) !!}

            <div class="form-group">

                    <label for="title" class="control-label">Title</label>

                     <select class="form-control" id="title" name="title">

                       <option value="">Please choose title</option>

                       <option value="Mr.">Mr</option>
                       <option value="Mrs.">Mrs</option>
                       <option value="Miss">Miss</option>                      

                     </select>

                    </div>


            {{ Form::bsText('firstname', '',['placeholder' => 'Enter your first name']) }}

            {{ Form::bsText('middlename', '',['placeholder' => 'Enter your middle name']) }}

            {{ Form::bsText('lastname', '',['placeholder' => 'Enter your last name']) }}


               {{ Form::bsText('name', '',['placeholder' => 'Enter name']) }}




            {{ Form::bsText('email', '',['placeholder' => 'Enter email']) }}

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

                    <label for="sex" class="control-label">Gender</label>

                     <select class="form-control" id="sex" name="sex">                  

                      <option value="">Please choose gender</option>            
                  

                       <option value="1">Male</option>

                       <option value="0">Female</option>
                                         

                     </select>

                  </div>


               <div class="form-group">

                    <label for="maritalstatus" class="control-label">Marital Status</label>

                     <select class="form-control" id="maritalstatus" name="maritalstatus">

                     

                      <option value=""> Choose marital status


                      </option>	

                      

                       <option value="1">Married</option>

                       <option value="0">Not Married</option>
                                         

                     </select>

                  </div>





            

            {{ Form::bsDate('dob', '',['placeholder' => 'Enter your birth date']) }}

            {{ Form::bsText('mobile', '',['placeholder' => 'Enter your mobile']) }}

            

            {{ Form::bsSubmit(__('messages.add'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







