<!-- Level Modal -->
<div class="modal fade" id="addLevel" tabindex="-1" role="dialog" aria-labelledby="addLevelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLevelLabel">{{__('messages.add')}} {{__('messages.level')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\LevelController@store','method' => 'POST']) !!}
      <div class="modal-body">         

            {{ Form::bsText('name','',['placeholder' =>  __('messages.level name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.level description'), 'label' => __('messages.description')]) }}       


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>


<!-- Center Modal -->
<div class="modal fade" id="addCenter" tabindex="-1" role="dialog" aria-labelledby="centerModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="centerModelLabel">{{__('messages.add')}} {{__('messages.center')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\CenterController@store','method' => 'POST']) !!}

      <div class="modal-body">

          {{ Form::bsText(__('messages.number'),'',['placeholder' =>  __('messages.center number'), 'label' => __('messages.number')]) }}

            {{ Form::bsText('name','',['placeholder' =>  __('messages.center name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' =>  __('messages.center description'), 'label' => __('messages.description')]) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>


<!-- Scale Modal -->
<div class="modal fade" id="addScale" tabindex="-1" role="dialog" aria-labelledby="scaleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scaleModalLabel">{{__('messages.add')}} {{__('messages.scale')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\ScaleController@store','method' => 'POST']) !!}
      <div class="modal-body">


        {{ Form::bsText('name','',['placeholder' =>   __('messages.scale name'), 'label' => __('messages.name')]) }}

        {{ Form::bsText('description','',['placeholder' =>   __('messages.scale description'), 'label' => __('messages.description')]) }}

        {{ Form::bsText('minimum','',['placeholder' =>   __('messages.minimum'), 'label' => __('messages.minimum')]) }}

        {{ Form::bsText('maximum','',['placeholder' =>   __('messages.maximum'), 'label' => __('messages.maximum')]) }}

        {{ Form::bsText('schedule','',['placeholder' =>   __('messages.schedule'), 'label' => __('messages.schedule')]) }}

                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>


<!-- Department Modal -->
<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="departmentModalLabel">{{__('messages.add')}} {{__('messages.department')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\DepartmentController@store','method' => 'POST']) !!}
      <div class="modal-body">



            {{ Form::bsText('name','',['placeholder' => __('messages.department name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.department description'), 'label' => __('messages.decription')]) }}

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>

       {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- Designation Modal -->
<div class="modal fade" id="addDesignation" tabindex="-1" role="dialog" aria-labelledby="designationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="designationModalLabel">{{__('messages.add')}} {{__('messages.designation')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\DesignationController@store','method' => 'POST']) !!}

      <div class="modal-body">


            {{ Form::bsText('name','',['placeholder' => __('messages.designation name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.designation description'), 'label' => __('messages.description')]) }}

                              <div class="form-group">

                    <label for="Levels" class="control-label">{{__('messages.level')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="level" name="level_id">

                       <option value="">{{__('messages.select employee level')}}</option>

                       @foreach($levels as $level)

                       <option value="{{ $level->id }}">{{ $level->name }}</option>

                       @endforeach

                     </select>

                     

                    </div>

                    </div>

                    <div class="form-group">

                    <label for="Scales" class="control-label">{{__('messages.scale')}}</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="scale" name="scale_id">

                       <option value="">{{__('messages.select employee scale')}}</option>

                       @foreach($scales as $scale)

                       <option value="{{ $scale->id }}">{{ $scale->name }}</option>

                       @endforeach

                     </select>

                     
                    </div>

                    </div>




        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>

       {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- Bank Modal -->
<div class="modal fade" id="addBank" tabindex="-1" role="dialog" aria-labelledby="bankModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bankModalLabel">{{__('messages.add')}} {{__('messages.bank')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\BankController@store','method' => 'POST']) !!}
      <div class="modal-body">


            {{ Form::bsText('name','',['placeholder' => __('messages.bank name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.bank description'), 'label' => __('messages.description')]) }}

      


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>


<!-- Payroll Group Modal -->
<div class="modal fade" id="addPayrollGroup" tabindex="-1" role="dialog" aria-labelledby="payrollGroupModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payrollGroupModelLabel">{{__('messages.add')}} {{__('messages.payroll group')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\PayrollGroupController@store','method' => 'POST']) !!}

      <div class="modal-body">

         

            {{ Form::bsText('name','',['placeholder' => __('messages.payroll group name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.payroll group description'), 'label' => __('messages.description')]) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Employment Type Model -->
<div class="modal fade" id="addEmploymentType" tabindex="-1" role="dialog" aria-labelledby="employmentTypeModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employmentTypeModelLabel">{{__('messages.add')}} {{__('messages.employment type')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\EmploymentTypeController@store','method' => 'POST']) !!}

      <div class="modal-body">

        

            {{ Form::bsText('name','',['placeholder' => __('messages.employment type name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.employment type description'), 'label' => __('messages.description')]) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Pay Type Modal -->
<div class="modal fade" id="addPayType" tabindex="-1" role="dialog" aria-labelledby="payTypeModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payTypeModelLabel">{{__('messages.add')}} {{__('messages.pay type')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\PayBaseController@store','method' => 'POST']) !!}

      <div class="modal-body">

      

            {{ Form::bsText('name','',['placeholder' => __('messages.pay type name'), 'label' => __('messages.name')]) }}

            {{ Form::bsText('description','',['placeholder' => __('messages.pay type description'), 'label' => __('messages.description')]) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('messages.close')}}</button>
        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>
