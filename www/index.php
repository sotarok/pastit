<?php
if (!isset($_SERVER['PATH_INFO'])) {
    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    if (!empty($request_uri)) {
        $parsed_uri = parse_url($request_uri);
        $request_uri = isset($parsed_uri['path']) ? $parsed_uri['path'] : '';
    }
    $_SERVER['PATH_INFO'] = $request_uri;
}

if (file_exists(__DIR__ . '/.maint')) {
    header('HTTP/1.1 503 Service Unavailable');
    echo "This site is under maintenance.";
    exit;
}

require_once dirname(__FILE__) . '/../app/Pastit_Controller.php';

/**
 * If you want to enable the UrlHandler, comment in following line,
 * and then you have to modify $action_map on app/Pastit_UrlHandler.php .
 *
 */
$_SERVER['URL_HANDLER'] = 'index';

/**
 * Run application.
 */
Pastit_Controller::main('Pastit_Controller', 'index');

