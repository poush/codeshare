@extends('front.layout')

@section('content')
<div id="search">
    <a class="close" title="Close" type="button">×</a>

    <form id="sform" name="sform">
      <input placeholder="{{Local::get('keywords_here')}}" type="search" value="">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>


  <div class="info">
    <div class="logo margin-10px"><a href="../"><img class="img-responsive" src=
    "images/logo.png"></a>
    </div>


    <div class="margin-10px">
      <button class="btn btn-danger btn-block btn-lg" id=
      "newSnippet">{{ Local::get('new_snippet') }}<span class=
      "glyphicon glyphicon-pencil"></span></button> <button class=
      "btn btn-success btn-block btn-lg" id="Searchbt">{{ Local::get('search') }}
      <span class="glyphicon glyphicon-search"></span></button>
      @include('front.userButtons')
    </div>


    <div class="margin-10px text-center">
      <p class="lead">{{ Config::get("settings.homeviewDesc")}}</p>
    </div>


    <div class="margin-10px">
      <form accept-charset="UTF-8" action="" class=
      "hidden padd-top-20px" id="newSnippetform" method="post" name=
      "newSnippetform">
        <div class="form-group">
          <input class="form-control" id="title" maxlength="50" name=
          "title" placeholder="{{Local::get('title')}}:" required="" type="text">
        </div>


        <div class="form-group">
          <textarea class="form-control" id="desc" maxlength="250" name="description" placeholder="{{Local::get('description')}}" required=""></textarea>
        </div>


        <div class="form-group">
          <select class="form-control" id="type" name="type"
          required="">
            <option value="0">
              {{Local::get('private')}}
            </option>

            <option selected value="1">
              {{Local::get('public')}}
            </option>
          </select>
        </div>


        <div class="form-group">
          <select class="form-control" id="lang" name="lang"
          required="">
            <option value="">
              {{Local::get('select_language')}}
            </option>

            <option value="Csharp">
              C#
            </option>

            <option value="Cpp">
              C/C++
            </option>

            <option value="CSS">
              CSS
            </option>

            <option value="HTML">
              HTML, XML
            </option>

            <option value="JSON">
              JSON
            </option>

            <option value="JavaScript">
              JavaScript
            </option>

            <option value="Objective-C">
              Objective C
            </option>

            <option value="PHP">
              PHP
            </option>

            <option value="SQL">
              SQL
            </option>
            <option value="other">Others</option>
          </select>
        </div>


        <div class="form-group">
          <button class="btn btn-success btn-block" type=
          "submit"><i class="fa fa-save"></i> {{Local::get('save')}}</button>
        </div>
      </form>
    </div>


    <div class="margin-10px">
      {{ Config::get('settings.adsense')}}
    </div>
  </div>


  <div>
    <div class="snippets" id="snippets">
      @include('front.list')
    </div>


    <div class="hidden" id="code">
      <textarea class="codewrite" placeholder="{{Local::get('type_here')}}...">{{ @Session::get('fork') }}</textarea>
    </div>
  </div>


  <form action="" class="hidden" id="redirect" method="get" name="redirect">
  </form>

 <!-- <nav class="navbar navbar-default navbar-fixed-bottom"></nav> -->

 <!-- User Panel In Model -->
 @include('front.userPanel')
@stop

@section('js')
<script type="text/javascript">
var  r = $('#redirect');
    $('#newSnippet').click(function()
    {
        $(this).toggleClass('active');
        $('#newSnippetform').toggleClass('hidden');
        $('#snippets').toggle();
        $('#code').toggleClass('hidden');
        $('#typeHere').removeClass('hidden');
        $('#description').toggleClass('hidden');


    });
    $('#newSnippetform').submit(function(e)
    {
        e.preventDefault();

        if($('.codewrite').val() == '')
         {
           $('.codewrite').focus();
           return;
         }

        $.post('create',{code:$('.codewrite').val(),title:$('#title').val(),description:$('#desc').val(),lang:$('#lang').val(),type:$('#type').val()},function(data)
        {
            if(data != 'error')
            {
                r.attr('action',data);
                r.submit();

            }
        });

    });
$("textarea").keydown(function(e) {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        // set textarea value to: text before caret + tab + text after caret
        $this.val(value.substring(0, start)
                    + "       "
                    + value.substring(end));

        // put caret at right position again (add one for the tab)
        this.selectionStart = this.selectionEnd = start + 4;

        // prevent the focus lose
        e.preventDefault();
    }
});

@if(Session::has('fork'))
    $('#newSnippet').click();
@endif
</script>
@stop
