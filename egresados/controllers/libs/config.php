<?php
/**
 * PROJECT
 */
define("PROJECT_NAME" , 'egresado');

/**
 * DATABASE
 */
define('HOST', 'localhost');
define('DBNAME' , "egresado");
define('USER' , 'root');
define('PASSWORD', '');
define('DRIVER', 'mysql');

/**
 * APP
 */
define('URL_APP' , dirname(dirname(__FILE__)));
define('URL_PROJECT', 'http://localhost/'.PROJECT_NAME.'/');
define('URL_PROJECT_PUBLIC', 'http://localhost/'.PROJECT_NAME.'/assets/');