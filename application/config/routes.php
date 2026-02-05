<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Pastikan "Auth" diawali huruf kapital jika nama filenya Auth.php
$route['default_controller'] = 'Auth'; 

// Route ini akan memetakan gofeeder.com/auth/login ke Auth/login
$route['auth/(:any)'] = 'Auth/$1';
$route['import/(:any)/(:any)'] = 'import/$1/$2';
$route['masterdata/(:any)/(:any)'] = 'masterdata/$1/$2';
$route['manajemen/(:any)/(:any)'] = 'manajemen/$1/$2';
$route['user/(:any)'] = 'user/$1';
$route['dashboard'] = 'user/Dashboard';
$route['404_override'] = ''; // Kosongkan dulu untuk debugging agar muncul error asli
$route['translate_uri_dashes'] = FALSE;