@extends('admin.layout')


@section('content')
@if(Session::has('errors'))
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li> {{ $error }} </li>
      @endforeach
    </ul>
  </div>
@endif
@if(isset($message))
 <div class="alert alert-success">
  {{ $message }}
 </div>
@endif
<form action="" method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Profile Settings</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Admin Name</label>  
  <div class="col-md-6">
  <input id="name" name="name" placeholder="My Name" class="form-control input-md" required="" type="text" value="{{ $user->name }}">
  <span class="help-block">Enter your name here</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="example@example.com" class="form-control input-md" required="" type="email" value="{{ $user->email }}">
  <span class="help-block">Enter email here</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="......" class="form-control input-md" required="" type="password">
    <span class="help-block">Enter Admin Password here</span>
  </div>
</div>
<div class="form-group ">
  <div class="col-md-12">
    <input class="btn btn-success btn-block" type="submit" value="Save">
  </div>
</div>

</fieldset>
</form>


@stop