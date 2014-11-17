<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" value="{{ Config::get('settings.homedesc') }}">
    <title>{{ Snipper::getTitle() }}</title>
<link rel="stylesheet" type="text/css" href="css/highlight.default.css">
    <script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/highlight.pack.js"></script>
<script>

$(document).ready(function() {
  $('pre').each(function(i, e) {hljs.highlightBlock(e)});
});

</script>

</head>
<body onload="window.print()">
<pre>
{{ $snippet->code }}
</pre>

</body>
</html>