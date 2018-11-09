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

            <img class="user_avatar" src="{{ asset('/storage/user_profile_photos/'.$user->photo)}}">


            {!! Form::open([ 'action' => array('UserController@update', $user->id),'files' => true,'method' => 'PUT']) !!}


            
                   <div class="form-group">

                    <label for="title" class="control-label">Title</label>

                     <select class="form-control" id="title" name="title">

                       <option value="{{ $user->title }}">{{ $user->title }}</option>

                       <option value="Mr.">Mr</option>
                       <option value="Mrs.">Mrs</option>
                       <option value="Miss">Miss</option>                      

                     </select>

                    </div>

            {{ Form::bsText('name', $user->name,['placeholder' => 'Enter your gender']) }}

                <div class="form-group">

                    <label for="sex" class="control-label">Gender</label>

                     <select class="form-control" id="sex" name="sex">

                    @if($user->sex == null)

                      <option value="{{ $user->sex }}">Please choose gender</option>                    
                    @elseif($user->sex)

                      <option value="{{ $user->sex }}">Male</option>	
                    @else

                    <option value="{{ $user->sex }}">Female</option>


                    @endif

                       <option value="1">Male</option>

                       <option value="0">Female</option>
                                         

                     </select>

                  </div>


               <div class="form-group">

                    <label for="maritalstatus" class="control-label">Marital Status</label>

                     <select class="form-control" id="maritalstatus" name="maritalstatus">

                     	@if($user->maritalstatus == null)

                      <option value="{{ $user->maritalstatus }}"> Choose marital status


                      </option>	

                      @elseif($user->maritalstatus)

                      <option value="{{ $user->maritalstatus }}"> Single


                      </option> 


                      @else<option value="{{ $user->maritalstatus }}"> Married


                      </option>	

                      @endif

                       <option value="1">Married</option>

                       <option value="0">Not Married</option>
                                         

                     </select>

                  </div>


            {{ Form::bsText('firstname', $user->firstname,['placeholder' => 'Enter your first name']) }}

            {{ Form::bsText('middlename', $user->middlename,['placeholder' => 'Enter your middle name']) }}

            {{ Form::bsText('lastname', $user->lastname,['placeholder' => 'Enter your lastname']) }}

            {{ Form::bsFile('photo',['placeholder'=>'change photo']) }}


            {{ Form::bsDate('dob', $user->dob,['placeholder' => 'Enter your birth date']) }}

            {{ Form::bsText('mobile', $user->mobile,['placeholder' => 'Enter your lastname']) }}

            

            {{ Form::bsSubmit(__('messages.edit'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







