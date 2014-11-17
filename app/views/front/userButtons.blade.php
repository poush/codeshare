@if(Auth::guest())
      <button class="btn btn-primary btn-block btn-lg" href="#signup" data-toggle="modal" data-target="#loginModel">{{Local::get('login')}}/{{Local::get('register')}}</button>
@else
<!-- Account Options -->
	<div class="btn-group btn-block">
	  <button type="button" class="btn btn-info btn-lg dropdown-toggle" style="width:100%" data-toggle="dropdown">
	    Welcome Back {{ Auth::user()->name }} <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" style="width:100%" role="menu">
	    <li><a href="../my">{{Local::get('my_snippets')}}</a></li>
	    <li><a href="#myaccountModel" data-toggle="modal" data-target="#myaccountModel">My Account</a></li>
	    <li class="divider"></li>
	    <li><a href="../logout">Logout</a></li>
	  </ul>
	</div>

@endif