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

Title <span class="form-caption">(* option)</span>: {{form_input name="title"}}
{{form_input name="content_type"}}<br />
{{form_input name="content"}}<br />


<p class="aright">
{{form_submit name="paste_do" value="Paste!"}}<br />
</p>

{{if !$app.is_login}}
<p class="login-notice">
Can't modify this paste because you are not logged-in.
</p>
{{/if}}
{{/form}}

<br class="clear" />
</div>

<!--
<h2>Latest Pasted</h2>
-->

