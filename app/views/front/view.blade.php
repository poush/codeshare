@extends('front.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="css/highlight.default.css">
@stop

@section('content')

<div class="info">

	<div class="logo margin-10px">
         <a href="../"><img class="img-responsive" src="images/logo.png"></a>
	</div>

    <div class="margin-10px">
        <h4 class="text-center"><strong> {{ $snippet->title }} </strong></h4>
        <div class="pull-right">
        </div>
        <br />
        <br />
        <p>
         {{ $snippet->description }} 
        </p>
        <p class="text-primary pull-right">
            <a class="" href="../{{ $snippet->authorId }}"><span class="label label-primary">{{Local::get('snippet_by')}} {{ User::name($snippet->authorId) }}</span></a>
        <br/>
            <span class="label label-default">{{Local::get('created_at')}} {{ $snippet->created_at }}</span>
        </p>

    </div>
        <div class="margin-10px text-center">
            <div class="ui-group-buttons">
                <button id="commentToggle" class="btn btn-primary btn-lg">{{Local::get('comments')}}</button>

                <a type="button" id="copyCode" href="{{Request::path()}}?print=print" target="_blank" class="btn btn-danger btn-lg">{{Local::get('print')}}</a>
         </div>
    </div>
    <div class="margin-10px text-center">
            <div class="ui-group-buttons">
                <a href="{{ Request::path() }}?raw=raw" target="_blank" class="btn btn-primary btn-lg">{{Local::get('view_text')}}</a>

                <a type="button" href="../?fork={{Request::path()}}" class="btn btn-success btn-lg">{{Local::get('fork') }}</a>
            </div>

    </div>
    <div class="margin-10px">
        <h4 class="text-success">{{Local::get('share')}}</h4>
        <input class=" form-control" readonly="" value="{{ Config::get('settings.Url') }}/{{$snippet->slug}}" />
    </div>
</div>

	<pre>{{$snippet->code }}</pre>

<div id="comments" class="hidden">
	<div class="margin-10px">
		    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = '{{ Config::get("settings.disqus") }}'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
	</div>
</div>


@stop

@section('js')
<script type="text/javascript" src="js/highlight.pack.js"></script>
<script>

$(document).ready(function() {
  $('pre').each(function(i, e) {hljs.highlightBlock(e)});
});

	$('#commentToggle').click(function()
	{
		$('.viewCode').toggleClass('half');
		$('#comments').toggleClass('hidden');
		$('#commentToggle').toggleClass('active');
	});

</script>
@stop