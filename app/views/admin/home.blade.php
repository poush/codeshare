@extends('admin.layout')


@section('content')

      @if(Config::get('script.outdated') == true)
      <div class="alert alert-danger">
        You have outdated version of Snipper.
        </div>
      @else
        <div class="alert alert-success"><strong> Hurray! You have updated version of Snipper</strong></div>
      @endif
      <div class="jumbotron">
        <h2>Welcome back {{ $user->name }}!</h2>
        <p class="lead">Stats are : </p>


      <ul class="list-group">
        <li class="list-group-item">Total Snippet Views : <span class="label label-primary">{{ Snipper::totalViews() }}</span></li>
        <li class="list-group-item">Total Snippets : <span class="label label-primary">{{ Snipper ::totalSnippets() }}</span></li>
        <li class="list-group-item">Snippet having highest views : <span class="label label-primary">{{ Snipper::highestView() }}</span></li>
        <li class="list-group-item">Script Version : <span class="label label-primary">{{ Config::get('script.version') }}</span></li>
        <li class="list-group-item">Last version Check : <span class="label label-primary">{{ Config::get('script.lastCheck') }}</span></li>
      </ul>
        <p><a class="btn btn-success" href="../admin/chkupdate" role="button">Check for updates</a></p>
      </div>





 @stop


 