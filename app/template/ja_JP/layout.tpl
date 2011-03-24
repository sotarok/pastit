<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="{{$config.url}}css/style.css" type="text/css" />
<title>Pastit</title>
</head>
<body>

<div id="header">
  <ul id="navigation">
    <li><a href=""><img src="{{$config.url}}images/header_logo.png" alt="Top" /></a></li>
    <li><a href="">New Paste</a></li>
    <li><a href="">Login</a></li>
    <!--
    <li><a href="">Timeline</a></li>
    <li><a href="">My Pastes</a></li>
    <li><a href="">Setting</a></li>
    -->
  </ul>
</div>

<div id="main">
{{$content}}
</div>

<div id="footer">
    Powered By <a href="http://strk.jp/">Sotarok</a> and <a href="http://ethna.jp">Ethna</a>-{{$smarty.const.ETHNA_VERSION}}.
</div>
</body>
</html>
