<?php
/** 
 * 
 * 
 */

function smarty_function_openid_form ($param, &$smarty)
{
    $form_id = $param['name'];
    $loginform_id = $param['form'];

    $c = Ethna_Controller::getInstance();

    $openids = array(
        //'facebook' => '',
        'google'   => 'https://www.google.com/accounts/o8/id',
        'hatena'   => 'http://www.hatena.ne.jp/',
        'livedoor' => 'http://livedoor.com/',
        'mixi'     => 'https://mixi.jp/',
        'myopenid' => 'https://www.myopenid.com/',
        'yahoo'    => 'http://www.yahoo.com/',
    );

    $html = '';
    $url = $c->getConfig()->get("url");
    foreach ($openids as $k => $v) {
        $add = "";
        if ($k == 'hatena') {
            $add = ' onclick="$(\'#'. $form_id .'\').val(\''. $v .'\' + prompt(\'hatena user id?\') + \'/\'); $(\'#'. $loginform_id .'\').submit(); return false;" ';
        }
        else {
            $add = ' onclick="$(\'#'. $form_id .'\').val(\''. $v .'\'); $(\'#'. $loginform_id .'\').submit(); return false;" ';
        }

        $html .= sprintf(
            '<img name="%s" src="%simages/openid/%s.png" %s class="login-openid"> ',
            $form_id, $url, $k, $add
        );

    }

    return $html;
}
