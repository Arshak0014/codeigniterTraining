<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['profile'] = 'profile/index';

$route['cart'] = 'cart/index';

$route['products/(:num)'] = 'products/index';
$route['products'] = 'products/index';
$route['products/(:any)'] = 'products/view/$1';

$route['categories/products/(:any)/(:num)'] = 'categories/products/$1/$2';
$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/products/(:any)'] = 'categories/products/$1';

$route['admin_dashboard'] = 'admin_dashboard/index';
$route['admin_categories'] = 'admin_categories/index';
$route['admin_products'] = 'admin_products/index';

$route['contact'] = 'pages/contact';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
