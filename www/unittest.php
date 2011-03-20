<?php
error_reporting(E_ALL);
require_once dirname(__FILE__) . '/../app/Pastit_Controller.php';

Pastit_Controller::main('Pastit_Controller', array(
    '__ethna_unittest__',
    )
);
