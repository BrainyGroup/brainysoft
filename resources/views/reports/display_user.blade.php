@extends('layouts.app')

@section('content')
   <div class="col-md-12">
    <div class="card">
        <div class="card-header">Users
          <span class="pull-right"> <a href="/users/create">{{ __('messages.add') }}</a></span>

        </div>

        

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

      
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered" id="users-table">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Marital status</th>

                      <th scope="col">Email</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Employee</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
              </table>
              </div>

       

        </div>
    </div>
</div>    
@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
       dom: 'Bfrtip',
    
        processing: true,
        serverSide: true,
        buttons: [
        'copy', 'excel', 'pdf'],
        ajax: '{{ url('/reports/index_user') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'sex', name: 'sex' },
            { data: 'maritalstatus', name: 'maritalstatus' },
            { data: 'email', name: 'email' },
            { data: 'mobile', name: 'mobile' },
            { data: 'dob', name: 'dob' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush
