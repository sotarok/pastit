<h1>{{$app.paste.title|default:"#"|cat:$app.paste.id}}</h1>

<pre>{{$app_ne.content}}</pre>

<p>user: {{if $app.user}}{{$app.user.nickname}}{{else}}-{{/if}}</p>
<p>created: {{$app.paste.created}}</p>

