@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.user')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="img"><img src="{{ asset('/storage/user_profile_photos/'.$user->photo)}}" alt="user passport" class="img-thumbnail"></div>

            {{-- <img class="avatar avatar-16 img-circle"  src="{{ asset('/storage/user_profile_photos/'.$user->photo)}}"> --}}


            {!! Form::open([ 'action' => array('Payroll\UserController@update', $user->id),'files' => true,'method' => 'PUT']) !!}


            
                   <div class="form-group">

                    <label for="title" class="control-label">{{__('messages.title')}}</label>

                     <select class="form-control" id="title" name="title">

                       <option value="{{ $user->title }}">{{ $user->title }}</option>

                       <option value="Mr.">{{__('messages.mr')}}</option>
                       <option value="Mrs.">{{__('messages.mrs')}}</option>
                       <option value="Miss">{{__('messages.miss')}}</option>                      

                     </select>

                    </div>

            {{ Form::bsText('name', $user->name,['placeholder' => __('messages.name'), 'label' => __('messages.name')]) }}

                <div class="form-group">

                    <label for="sex" class="control-label">{{__('messages.gender')}}</label>

                     <select class="form-control" id="sex" name="sex">

                    @if($user->sex == null)

                      <option value="{{ $user->sex }}">{{__('messages.select gender')}}</option>                    
                    @elseif($user->sex)

                      <option value="{{ $user->sex }}">{{__('messages.male')}}</option>	
                    @else

                    <option value="{{ $user->sex }}">{{__('messages.female')}}</option>


                    @endif

                       <option value="1">{{__('messages.male')}}</option>

                       <option value="0">{{__('messages.female')}}</option>
                                         

                     </select>

                  </div>


               <div class="form-group">

                    <label for="maritalstatus" class="control-label">{{__('messages.marital status')}}</label>

                     <select class="form-control" id="maritalstatus" name="maritalstatus">

                     	@if($user->maritalstatus == null)

                      <option value="{{ $user->maritalstatus }}"> {{__('messages.select marital status')}}


                      </option>	

                      @elseif($user->maritalstatus)

                      <option value="{{ $user->maritalstatus }}"> {{__('messages.single')}}


                      </option> 


                      @else<option value="{{ $user->maritalstatus }}"> {{__('messages.married')}}


                      </option>	

                      @endif

                       <option value="1">{{__('messages.married')}}</option>

                       <option value="0">{{__('messages.single')}}</option>
                                         

                     </select>

                  </div>


            {{ Form::bsText('firstname', $user->firstname,['placeholder' => __('messages.first name'), 'label' => __('messages.first name')]) }}

            {{ Form::bsText('middlename', $user->middlename,['placeholder' => __('messages.middle name'), 'label' => __('messages.middle name')]) }}

            {{ Form::bsText('lastname', $user->lastname,['placeholder' => __('messages.last name'), 'label' => __('messages.last name')]) }}

            {{ Form::bsText('national_id', $user->national_id,['placeholder' => __('messages.national identification number'), 'label' => __('messages.national identification number')]) }}

            {{ Form::bsFile('photo',['placeholder'=>__('messages.change photo'), 'label' => __('messages.change photo')]) }}

            {{-- <div class="form-group">

              <label for="role" class="control-label">{{__('messages.role')}}</label>

              <div class="input-group mb-3">

               <select class="form-control" id="role" name="role_id">

                 <option value="{{ $user->role_id }}">{{ $role_name }}</option>

                 @foreach($roles as $role)

                 <option value="{{ $role->id }}">{{ $role->name }}</option>

                 @endforeach

               </select>

                
              </div>

              </div> --}}

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Role:</strong>
                      {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                  </div>
              </div>


            {{ Form::bsDate('dob', $user->dob,['placeholder' => __('messages.date of birth'), 'label' => __('messages.date of birth')]) }}

            {{ Form::bsText('mobile', $user->mobile,['placeholder' => __('messages.mobile'), 'label' => __('messages.mobile')]) }}

            

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection







