@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">Add Documentation</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('Payroll\DocumentationController@update', $documentation->id),'method' => 'PUT'])  !!}

            {{ Form::bsText('title',$documentation->title,['placeholder' => 'Enter title']) }}

            {{-- {{ Form::bsText('description','',['class' => 'form-control summernote']) }} --}}

            <div class="form-group">
                <label>Description</label>
                
            <textarea name="description" rows="5" cols="40" class="form-control summernote" value="{{$documentation->description}}"></textarea>
            </div>  

            {{-- {{ Form::bsText('author',$documentation->author,['placeholder' => 'Enter author']) }} --}}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection