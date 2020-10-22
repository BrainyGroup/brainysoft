@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{__('messages.add')}} {{__('messages.documentation')}}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {!! Form::open(['action' => 'Payroll\DocumentationController@store','method' => 'POST']) !!}

            {{ Form::bsText('title','',['placeholder' => __('messages.title'), 'label' => __('messages.title')]) }}

            {{-- {{ Form::bsText('description','',['class' => 'form-control summernote']) }} --}}

            <div class="form-group">
                <label>{{__('messages.description')}}</label>
                <textarea name="description" rows="5" cols="40" class="form-control summernote"></textarea>
            </div>  

            {{ Form::bsText('author','',['placeholder' => __('messages.author'), 'label' => __('messages.author')) }}

            {{ Form::bsSubmit('Submit',['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>
</div>    
@endsection

