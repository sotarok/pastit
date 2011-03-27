<h1>Login</h1>

{{include file="errors.tpl"}}

{{form action=$config.url|cat:"login_do" name="login_form" id="login_form" ethna_action="login_do"}}
OpenID URL: {{form_input id="form_openid_url" name="url" value=$config.app.openid.default_endpoint}}
{{form_submit value="Login"}}
{{/form}}

{{if $config.app.openid.enable_external_service_list}}
<div class="login_services">
{{openid_form name='form_openid_url' form='login_form'}}
</div>
{{/if}}

