<h2>Paste It!</h2>

{{form ethna_action="paste_do" name="paste"}}

{{if count($errors)}}
<div class="errors">
<ul>
{{foreach from=$errors item=error}}
  <li>{{$error}}</li>
{{/foreach}}
</ul>
</div>
{{/if}}

{{form_input name="content"}}<br />
{{form_input name="content_type"}}<br />
{{form_submit name="paste_do" value="貼りつけ"}}<br />
{{/form}}

<h2>Latest Pasted</h2>

