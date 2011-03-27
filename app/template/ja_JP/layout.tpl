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
    <li><a href="{{$config.url}}"><img src="{{$config.url}}images/header_logo.png" alt="Top" /></a></li>
    <li><a href="{{$config.url}}">New Paste</a></li>
    {{if !$app.is_login}}
    <li>{{form action=$config.url|cat:"login_do" name="global_login" id="global_login" ethna_action="login_do"}}{{form_input id="openid_url" name="url" value=$config.app.openid.default_endpoint}}{{form_submit value="Login"}}{{/form}}
      {{if $config.app.openid.enable_external_service_list}}
      <div class="global_login_services">
      {{openid_form name='openid_url' form='global_login'}}
      </div>
      {{/if}}
    </li>
    {{else}}
    {{*
    <li><a href="{{$config.url}}timeline">Timeline</a></li>
    <li><a href="{{$config.url}}my">My Pastes</a></li>
    *}}
    <li><a href="{{$config.url}}setting">Setting</a></li>
    <li><a href="{{$config.url}}logout">Logout</a></li>
    {{/if}}
    <!--
    -->
  </ul>
</div>

<div id="main">
{{$content}}
</div>

<div id="footer">
  <p>
    Powered By <a href="http://strk.jp/">Sotarok</a> and <a href="http://ethna.jp">Ethna</a>.<br>
    <a href="http://github.com/sotarok/pastit/">github.com/sotarok/pastit</a>.
  </p>
</div>
</body>
</html>
