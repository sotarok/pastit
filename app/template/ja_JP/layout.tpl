<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="{{$config.url}}css/style.css" type="text/css" />
<title>Pastit</title>
</head>
<body>
<div id="header">
    <h1>Pastit - Paste It!</h1>
</div>

<div id="main">
{{$content}}
</div>

<div id="footer">
    Powered By <a href="http://strk.jp/">Sotarok</a> and <a href="http://ethna.jp">Ethna</a>-{{$smarty.const.ETHNA_VERSION}}.
</div>
</body>
</html>
