<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'auth';
$route['dashboard'] = 'user/dashboard';
// $route['user/(:any)'] = 'manajemen/menu/$1';
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;
