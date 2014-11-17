@extends('admin.layout')

@section('content')
@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<form class="form-horizontal" method="post">
<fieldset>


<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='new_snippet' class="form-control input-xlarge" type="text" value='{{Local::get('new_snippet')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='search' class="form-control input-xlarge" type="text" value='{{Local::get('search')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='welcome_back' class="form-control input-xlarge" type="text" value='{{Local::get('welcome_back')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='save' class="form-control input-xlarge" type="text" value='{{Local::get('save')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='title' class="form-control input-xlarge" type="text" value='{{Local::get('title')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='description' class="form-control input-xlarge" type="text" value='{{Local::get('description')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='public' class="form-control input-xlarge" type="text" value='{{Local::get('public')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='private' class="form-control input-xlarge" type="text" value='{{Local::get('private')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='select_language' class="form-control input-xlarge" type="text" value='{{Local::get('select_language')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='type_here' class="form-control input-xlarge" type="text" value='{{Local::get('type_here')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='keywords_here' class="form-control input-xlarge" type="text" value='{{Local::get('keywords_here')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='comments' class="form-control input-xlarge" type="text" value='{{Local::get('comments')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='print' class="form-control input-xlarge" type="text" value='{{Local::get('print')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='view_text' class="form-control input-xlarge" type="text" value='{{Local::get('view_text')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='fork' class="form-control input-xlarge" type="text" value='{{Local::get('fork')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='share' class="form-control input-xlarge" type="text" value='{{Local::get('share')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='created_at' class="form-control input-xlarge" type="text" value='{{Local::get('created_at')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='login' class="form-control input-xlarge" type="text" value='{{Local::get('login')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='register' class="form-control input-xlarge" type="text" value='{{Local::get('register')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='close' class="form-control input-xlarge" type="text" value='{{Local::get('close')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='registerSuccess' class="form-control input-xlarge" type="text" value='{{Local::get('registerSuccess')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='incorrect_login' class="form-control input-xlarge" type="text" value='{{Local::get('incorrect_login')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='email' class="form-control input-xlarge" type="text" value='{{Local::get('email')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='password' class="form-control input-xlarge" type="text" value='{{Local::get('password')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='re_pass' class="form-control input-xlarge" type="text" value='{{Local::get('re_pass')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='name' class="form-control input-xlarge" type="text" value='{{Local::get('name')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='logout' class="form-control input-xlarge" type="text" value='{{Local::get('logout')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='myaccount' class="form-control input-xlarge" type="text" value='{{Local::get('myaccount')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='password_change' class="form-control input-xlarge" type="text" value='{{Local::get('password_change')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='no_email_change' class="form-control input-xlarge" type="text" value='{{Local::get('no_email_change')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='my_snippets' class="form-control input-xlarge" type="text" value='{{Local::get('my_snippets')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='new_pass' class="form-control input-xlarge" type="text" value='{{Local::get('new_pass')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='re_new_pass' class="form-control input-xlarge" type="text" value='{{Local::get('re_new_pass')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='remember' class="form-control input-xlarge" type="text" value='{{Local::get('remember')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='forgetPass' class="form-control input-xlarge" type="text" value='{{Local::get('forgetPass')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='password_mail' class="form-control input-xlarge" type="text" value='{{Local::get('password_mail')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='send' class="form-control input-xlarge" type="text" value='{{Local::get('send')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='reminder_sent' class="form-control input-xlarge" type="text" value='{{Local::get('reminder_sent')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='invalid_user_email' class="form-control input-xlarge" type="text" value='{{Local::get('invalid_user_email')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='pass_pass_confirm_mismatch' class="form-control input-xlarge" type="text" value='{{Local::get('pass_pass_confirm_mismatch')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='name_validation' class="form-control input-xlarge" type="text" value='{{Local::get('name_validation')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='email_validation' class="form-control input-xlarge" type="text" value='{{Local::get('email_validation')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='pass_length' class="form-control input-xlarge" type="text" value='{{Local::get('pass_length')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='email_taken' class="form-control input-xlarge" type="text" value='{{Local::get('email_taken')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='name_length' class="form-control input-xlarge" type="text" value='{{Local::get('name_length')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='snippets_by' class="form-control input-xlarge" type="text" value='{{Local::get('snippets_by')}}'>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='snippet_by' class="form-control input-xlarge" type="text" value='{{Local::get('snippet_by')}}'>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='successUpdated' class="form-control input-xlarge" type="text" value='{{Local::get('successUpdated')}}'>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='invalidToken' class="form-control input-xlarge" type="text" value='{{Local::get('invalidToken')}}'>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='notfoundUser' class="form-control input-xlarge" type="text" value='{{Local::get('notfoundUser')}}'>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='pass_invalid_mis_match' class="form-control input-xlarge" type="text" value='{{Local::get('pass_invalid_mis_match')}}'>
  </div>
</div>
<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input name='resetSuccess' class="form-control input-xlarge" type="text" value='{{Local::get('resetSuccess')}}'>
  </div>
</div>

<button class="btn btn-success btn-block">Save</button>
</fieldset>
</form>
@stop