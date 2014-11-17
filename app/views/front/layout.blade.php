<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" value="{{ (Request::path() == '/')?'':(@$snippet->title) }}{{ Config::get('settings.homedesc') }}">
    <title>{{ Snipper::getTitle() }}</title>
    {{ HTML::script(asset('js/jquery.min.js'))}}

    <!-- Bootstrap -->
    {{ HTML::style(asset('css/bootstrap.min.css'))}}
    {{ HTML::style(asset('css/custom.css'))}}

    @yield('css','')
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>



    @yield('content')

<div class="footer">
  <div class="margin-10px">
  @if(Config::get('settings.socialButtons')) 
  <div class="pull-left">
    <div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>  
    </div>
    <div class="pull-left margin-left-10px">
    <div class="g-plusone"></div> 
    </div>
    <div class="pull-left margin-left-10px">
  <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
  </div>
  @endif
 <div class="pull-right">
   {{ Config::get('settings.copyright') }}
 </div>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   {{ HTML::script(asset('js/bootstrap.min.js'))}}


<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@yield('js','')



<script type="text/javascript">
      $('button#Searchbt').on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('active');
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
            $('button#Searchbt').toggleClass('active');
        }
    });
    
    $('#sform').submit(function(event) {
        event.preventDefault();
        $.getJSON('search/'+$('input').val(),function(data)
        {
          if(data == '')
          {
            alert('No Results');
            return 0;
          }
          $('#snippets').html('<div class="page-header"><h1>Search Results</h1></div>');
          $.each(data,function(index,value)
          {
            var toadd = '<div class="col-sm-4"><div class="panel panel-default "><div class="panel-body no-padding"><a href="/'+value.slug+'"><img class="img-responsive" alt="'+value.title+'" src="images/'+value.category+'.png"></a></div><div class="panel-footer"><a href="'+value.slug+'">'+value.title+'</a></div></div></div>';
            $('#snippets').append(toadd);
            $('#search').removeClass('open');
          });
          $('button#Searchbt').toggleClass('active');
        });
        });
 

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '{{ Config::get('settings.googleanalystics') }}', 'auto');
  ga('send', 'pageview');

</script>

  </body>
</html>
