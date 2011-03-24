<h1>New Paste</h1>

<div id="new-paste">
{{form ethna_action="paste_do" name="paste" id="paste-form"}}

{{if count($errors)}}
<div class="errors">
<ul>
{{foreach from=$errors item=error}}
  <li>{{$error}}</li>
{{/foreach}}
</ul>
</div>
{{/if}}

{{form_input name="title"}} (* option)
{{form_input name="content_type"}}<br />
{{form_input name="content"}}<br />
{{form_submit name="paste_do" value="Paste!"}}<br />
{{/form}}

<br class="clear" />
</div>

<!--
<h2>Latest Pasted</h2>
-->

