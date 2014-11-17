<?php $id = 0; $inline = Config::get('settings.inlineAds'); ?>
<div id="snippets"class="row">
@if(Request::is('my'))
	<div class="col-sm-12"><h1>{{Local::get('my_snippets')}}</h1></div>
@endif
@if(isset($user))
	<div class="col-sm-12"><h1>{{Local::get('snippets_by')}} {{$user}}</h1></div>
@endif

	@foreach($snippets as $snippet)
		@if(($id == 4 || $id == 8)&& $inline)				
		<div class="col-sm-4 adsBlock">
			<div class="panel ads panel-default ">
		  <div class="panel-body no-padding">
				{{ Config::get('settings.adsense') }}				
		  </div>
		</div>
	</div>
		@endif
		<div class="col-sm-4">
			<div class="panel panel-default ">
		  <div class="panel-body no-padding">
		    <a href="/{{$snippet->slug}}"><img class="thumbImage" alt="{{$snippet->title}}" src="images/{{$snippet->category}}.png"></a>
		  </div>
		  <div class="panel-footer"><a href="/{{$snippet->slug}}">{{$snippet->title}}</a></div>
		</div>
	</div>
 	<?php $id++; ?>
	@endforeach
</div>

<div class="Pagelinks">
	<div class="text-center">
		{{@ $snippets->links() }}
	</div>
</div>
