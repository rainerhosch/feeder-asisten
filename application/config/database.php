<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
* Database configuration
* 
* Default database configuration
* 
* Database configuration for SIMAK
* 
* Database configuration for SISKEU
* 
* Database configuration for PMB
*/
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn' => '',
	'hostname' => env('DB_HOST', 'localhost'),
	'username' => env('DB_USER', 'root'),
	'password' => env('DB_PASS', ''),
	'database' => env('DB_NAME', 'db_not_found'),	
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8mb4',
	'dbcollat' => 'utf8mb4_unicode_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

// db simak live
$db['wastudig_simak'] = array(
	'dsn'	=> '',
	'hostname' => env('WASTUDIG_SIMAK_DB_HOST', 'localhost'),
	'username' => env('WASTUDIG_SIMAK_DB_USER', 'root'),
	'password' => env('WASTUDIG_SIMAK_DB_PASS', ''),
	'database' => env('WASTUDIG_SIMAK_DB_NAME', 'db_not_found'),
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

// db siskeu server
$db['db_siskeu_new'] = array(
	'dsn'	=> '',
	'hostname' => env('WASTUDIG_SIMAK_DB_HOST', 'localhost'),	
	'username' => env('WASTUDIG_SISKEU_DB_USER', 'root'),
	'password' => env('WASTUDIG_SISKEU_DB_PASS', ''),
	'database' => env('WASTUDIG_SISKEU_DB_NAME', 'db_not_found'),
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

// db pmb live
$db['wastudig_pmb'] = array(
	'dsn'	=> '',
	'hostname' => env('WASTUDIG_SIMAK_DB_HOST', 'localhost'),
	'username' => env('WASTUDIG_PMB_DB_USER', 'root'),
	'password' => env('WASTUDIG_PMB_DB_PASS', ''),
	'database' => env('WASTUDIG_PMB_DB_NAME', 'db_not_found'),
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

