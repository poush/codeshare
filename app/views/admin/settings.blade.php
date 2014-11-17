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
<form class="form-horizontal" enctype="multipart/form-data" action="../admin/settings" method="post">
<fieldset>

<!-- Form Name -->
<legend>Settings</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="SiteName">Site Name</label>  
  <div class="col-md-6">
  <input id="SiteName" name="SiteName" placeholder="Snippets Site" class="form-control input-md"  type="text" value="{{ Config::get('settings.SiteName') }}">
  <span class="help-block">Name/Title of your site</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="disqus">Disqus Short Name</label>  
  <div class="col-md-6">
  <input id="disqus" name="disqus" placeholder="something.." class="form-control input-md"  type="text" value="{{ Config::get('settings.disqus') }}">
  <span class="help-block">Enter the disqus short name for disqus comments on your website. If you do not have one then get one from http://disqus.com</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Url">Url</label>  
  <div class="col-md-6">
  <input id="Url" name="Url" placeholder="something.com.." class="form-control input-md"  type="text" value="{{ Config::get('settings.Url') }}">
  <span class="help-block">Full url to your site excluding http://</span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="adsense">Google Adsense Code</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="adsense" name="adsense">{{ Config::get('settings.adsense') }}</textarea>
      <span class="help-block">Please only add Text/image 300X250 size ad so that it properly fits to website</span>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Inline Ads</label>
  <div class="col-md-4">
    <select name="inlineAds" class="form-control">
      <option value="0" {{{ (Config::get('settings.inlineAds')=='0')?'selected=""':'' }}}>No</option>
      <option value="1" {{{ (Config::get('settings.inlineAds')=='1')?'selected=""':'' }}}>Yes</option>
    </select>
    <span class="help-block">Select Yes if you show ads in the snippets list on home page</span>
  </div>
</div>
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="logo">Upload Logo</label>
  <div class="col-md-4">
    <input id="logo" name="logo" class="input-file" type="file">
  <span class="help-block">Do not select if you do not want to change logox</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="view">Snippet Page Title</label>  
  <div class="col-md-6">
  <input id="view" name="snippetTitle" placeholder="{page}" class="form-control input-md" type="text" value="{{ Config::get('settings.snippetTitle') }}">
  <span class="help-block">Enter the page title method for snippet page</span>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="googlanalystics">Google Analystics ID</label>  
  <div class="col-md-6">
  <input id="googlanalystics" name="googleanalystics" placeholder="UA-XXXXXXX-X" class="form-control input-md" type="text" value="{{ Config::get('settings.googleanalystics') }}">
  <span class="help-block">Eg UA-XXXXXXX-X</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Home Page Title</label>  
  <div class="col-md-6">
  <input id="title" name="title" placeholder="" class="form-control input-md" required="" type="text" value="{{ Config::get('settings.title') }}">
  <span class="help-block">Keep it short as possible</span>  
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="homedesc">Home Page Meta Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="homedesc" name="homedesc" >{{ Config::get('settings.homedesc') }}</textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="homeviewDesc">Home Page Description </label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="homeviewDesc" name="homeviewDesc">{{ Config::get('settings.homeviewDesc') }}</textarea>
    <span class="help-block">This is shown on home page under search button</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="copyright">Copyright Line</label>  
  <div class="col-md-6">
  <input id="copyright" name="copyright" placeholder="my company" class="form-control input-md" required="" type="text" value="{{Config::get('settings.copyright') }}">
  <span class="help-block">Enter the copy right line to be shown on footer of main site</span>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="socialButtons">Enable Social Buttons</label>  
  <div class="col-md-6">
 <div class="btn-group btn-toggle" data-toggle="buttons">
    <label class="btn {{ (1 == Config::get('settings.socialButtons'))?'btn-success active':'btn-default'}}">
      <input name="socialButtons" value="1" type="radio" {{ (1 == Config::get('settings.socialButtons'))?'checked=""':''}}> Yes
    </label>
    <label class="btn {{ (1 != Config::get('settings.socialButtons'))?'btn-success active':'btn-default'}}">
      <input name="socialButtons" value="0" type="radio" {{ (1 != Config::get('settings.socialButtons'))?'checked=""':''}}> No
    </label>
  </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="snippetsNewestfirst">Show Snippets as</label>  
  <div class="col-md-6">
 <div class="btn-group btn-toggle" data-toggle="buttons">
    <label class="btn {{ (1 == Config::get('settings.snippetsNewestfirst'))?'btn-success active':'btn-default'}}">
      <input name="snippetsNewestfirst" value="1" type="radio" {{ (1 == Config::get('settings.snippetsNewestfirst'))?'checked=""':''}}> Newest First
    </label>
    <label class="btn {{ (1 != Config::get('settings.snippetsNewestfirst'))?'btn-success active':'btn-default'}}">
      <input name="snippetsNewestfirst" value="0" type="radio" {{ (1 != Config::get('settings.snippetsNewestfirst'))?'checked=""':''}}> Old First
    </label>
  </div>
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

@section('js')
<script type="text/javascript">
  $('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
      $(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
      $(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
      $(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
      $(this).find('.btn').toggleClass('btn-info');
    }
    
    $(this).find('.btn').toggleClass('btn-default');
       
});
</script>
@stop