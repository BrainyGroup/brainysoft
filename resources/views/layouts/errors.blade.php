@if(isset($errors)&&count($errors)>0)
<div class="col-md-8">
<div class="form-group">
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
</div>
@elseif(session()->has('error'))
<div class="form-group">
  <div class="alert alert-danger">
    <ul>
      <li>{{session()->get('error')}}</li>
    </ul>
  </div>
</div>
</div>
@endif
