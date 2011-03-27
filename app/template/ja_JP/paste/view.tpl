<h1>{{$app.paste.title|default:"#"|cat:$app.paste.id}}</h1>

<div class="paste_view">
<div class="paste_side">
<p>user: {{if $app.user}}{{$app.user.nickname}}{{else}}-{{/if}}</p>
<p>created: {{$app.paste.created}}</p>
<p>embed: <input type="text" readonly value="{{$app.embed_code}}"></p>
</div>
<div class="paste_content">
{{$app_ne.content}}
</div>
<br class="clear">
</div>
