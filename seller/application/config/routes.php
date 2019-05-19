<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['account/(:any)'] = 'seller/account/$1';
$route['(:any)'] = 'seller/page/$1';
$route['default_controller'] = 'seller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
