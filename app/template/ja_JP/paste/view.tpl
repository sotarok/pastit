<h1>{{if !empty($app.paste.title)}}
{{$app.paste.title}}
{{else}}
#{{$app.paste.id}}
{{/if}}
</h1>

<div class="paste_view">
<div class="paste_side">
{{if $app.is_login}}
{{if $app.paste.user_id == $session.user.id}}
<p><a href="{{$config.url}}edit?id={{$app.paste.id}}">&gt; Edit</a></p>
{{/if}}
{{/if}}
<p>Raw: <a href="{{$config.url}}{{$app.paste.id}}?format=raw">raw format</a></p>
<p>Type: {{$app.paste.content_type}}</p>
<p>User: {{if $app.user}}{{$app.user.nickname}}{{else}}-{{/if}}</p>
<p>Created: {{$app.paste.created}}</p>
{{*
<p>Embed: <input type="text" readonly value="{{$app.embed_code}}"></p>
*}}
</div>
<div class="paste_content">
{{$app_ne.content}}
</div>
<br class="clear">
</div>
