<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['postpaid/(:any)'] = 'pages/postpaid/$1';
$route['numbers/(:any)'] = 'pages/numbers/$1';
$route['checkout/(:any)'] = 'pages/checkout/$1';
$route['(:any)'] = 'pages/page/$1';
$route['default_controller'] = 'pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
