{{if count($errors)}}
<div class="errors">
<ul>
{{foreach from=$errors item=error}}
  <li>{{$error}}</li>
{{/foreach}}
</ul>
</div>
{{/if}}
