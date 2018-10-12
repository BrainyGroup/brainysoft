<!-- Level Modal -->
<div class="modal fade" id="addLevel" tabindex="-1" role="dialog" aria-labelledby="addLevelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLevelLabel">Add Company Structure Levels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'LevelController@store','method' => 'POST']) !!}
      <div class="modal-body">         

            {{ Form::bsText('name','',['placeholder' => 'Enter level name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter level description']) }}       


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="centerModelLabel">Add Center</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'CenterController@store','method' => 'POST']) !!}

      <div class="modal-body">

          {{ Form::bsText(__('messages.number'),'',['placeholder' => __('messages.enter number')]) }}

            {{ Form::bsText('name','',['placeholder' => 'Enter center name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter center description']) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="scaleModalLabel">Add Scales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'ScaleController@store','method' => 'POST']) !!}
      <div class="modal-body">


        {{ Form::bsText('name','',['placeholder' => 'Enter scale name']) }}

        {{ Form::bsText('description','',['placeholder' => 'Enter scale description']) }}

        {{ Form::bsText('minimum','',['placeholder' => 'Enter minimum salary']) }}

        {{ Form::bsText('maximum','',['placeholder' => 'Enter maximum salary']) }}

        {{ Form::bsText('schedule','',['placeholder' => 'Enter salary circle']) }}

                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="departmentModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'DepartmentController@store','method' => 'POST']) !!}
      <div class="modal-body">



            {{ Form::bsText('name','',['placeholder' => 'Enter department name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter department description']) }}

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="designationModalLabel">Add designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'DesignationController@store','method' => 'POST']) !!}

      <div class="modal-body">


            {{ Form::bsText('name','',['placeholder' => 'Enter designation name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter designation description']) }}

                              <div class="form-group">

                    <label for="Levels" class="control-label">Levels</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="level" name="level_id">

                       <option value="">Select employee level</option>

                       @foreach($levels as $level)

                       <option value="{{ $level->id }}">{{ $level->name }}</option>

                       @endforeach

                     </select>

                     

                    </div>

                    </div>

                    <div class="form-group">

                    <label for="Scales" class="control-label">Scales</label>

                    <div class="input-group mb-3">

                     <select class="form-control" id="scale" name="scale_id">

                       <option value="">Select salary scale</option>

                       @foreach($scales as $scale)

                       <option value="{{ $scale->id }}">{{ $scale->name }}</option>

                       @endforeach

                     </select>

                     
                    </div>

                    </div>




        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="bankModalLabel">Add Company Structure Levels</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


          @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'BankController@store','method' => 'POST']) !!}
      <div class="modal-body">


            {{ Form::bsText('name','',['placeholder' => 'Enter Kin name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter Kin description']) }}

      


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="payrollGroupModelLabel">Add Payroll group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'PayrollGroupController@store','method' => 'POST']) !!}

      <div class="modal-body">

         

            {{ Form::bsText('name','',['placeholder' => 'Enter center name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter center description']) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="employmentTypeModelLabel">Add Employment type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'EmploymentTypeController@store','method' => 'POST']) !!}

      <div class="modal-body">

        

            {{ Form::bsText('name','',['placeholder' => 'Enter center name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter center description']) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
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
        <h5 class="modal-title" id="payTypeModelLabel">Add Pay type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'PayBaseController@store','method' => 'POST']) !!}

      <div class="modal-body">

      

            {{ Form::bsText('name','',['placeholder' => 'Enter center name']) }}

            {{ Form::bsText('description','',['placeholder' => 'Enter center description']) }}        

           


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
       {!! Form::close() !!}
    </div>
  </div>
</div>
