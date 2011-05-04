<?php
if (!isset($_SERVER['PATH_INFO'])) {
    $_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'];
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

