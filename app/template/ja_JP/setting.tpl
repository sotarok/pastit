<h1>User Setting</h1>

<div>
{{form name="setting" ethna_action="setting_do" action=$config.url|cat:"setting_do"}}
{{include file="errors.tpl"}}
Identity: {{$app.user.identity}}<br>
Nickname: {{form_input name="nickname" value=$session.user.nickname}}<br>
{{form_submit value="Update"}}
{{/form}}
</div>

<h2>Token</h2>
<div>
Token: <span class="setting_token">{{$app.user.token}}</span>
</div>

<h2>Tools</h2>
<p>
Command-line tool to post Pastit.
</p>
<h3>SetUp</h3>
<p>
Download: <a href="{{$config.url}}download">pastit</a>
</p>
<pre>
$ wget -O ~/bin/pastit {{$config.url}}pastit
$ echo "token={{$app.user.token}}" > ~/.pastit
</pre>

<h3>Usage</h3>

Paste file:
<pre>
$ pastit hoge.php
</pre>

Paste with stdin:
<pre>
$ diff -u a.txt b.txt | pastit
</pre>

Paste with stdin (type specified):
<pre>
$ git diff hoge.php master..origin/master | pastit -t diff
</pre>
