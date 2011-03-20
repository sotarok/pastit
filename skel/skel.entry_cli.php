<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    Pastit
 *  @version    $Id$
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/Pastit_Controller.php';

ini_set('max_execution_time', 0);

Pastit_Controller::main_CLI('Pastit_Controller', '{$action_name}');
