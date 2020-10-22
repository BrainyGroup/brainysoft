@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{__('messages.edit')}} {{__('messages.documentation')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => array('Payroll\DocumentationController@update', $documentation->id),'method' => 'PUT'])  !!}

            {{ Form::bsText('title',$documentation->title,['placeholder' => __('messages.title'), 'label' => __('messages.title')]) }}

            {{-- {{ Form::bsText('description','',['class' => 'form-control summernote']) }} --}}

            <div class="form-group">
                <label>{{__('messages.description')}}</label>
                
            <textarea name="description" rows="5" cols="40" class="form-control summernote" value="{{$documentation->description}}"></textarea>
            </div>  

            {{-- {{ Form::bsText('author',$documentation->author,['placeholder' => 'Enter author']) }} --}}

            {{ Form::bsSubmit(__('messages.save'),['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection