

@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h2>{{ __('messages.allowance_type') }}s</h2></div>

        <div class="card-body">
			<div id="app">
				<allowance_type></allowance_type>
			</div>
      
        </div>
    </div>
</div>    
<script src="/js/app.js"></script>
@endsection
