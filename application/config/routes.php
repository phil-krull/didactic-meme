<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['login'] = "sessions/signin";
$route['register'] = "users/register";
$route['users'] = "users/create";
$route['users/new'] = "users/newuser";
$route['users/edit'] = "users/edit";
$route['users/show/(:any)'] = "users/show/$1";
$route['users/update/(:any)'] = "users/update/$1";
$route['users/password_update/(:any)'] = "users/password_update/$1";
$route['admins/edit/(:any)'] = "admins/edit/$1";
$route['admins/update/(:any)'] = "admins/update/$1";
$route['admins/destroy/(:any)'] = "admins/destroy/$1";
$route['dashboard'] = "dashboard/show";
$route['messages/(:any)'] = "messages/create/$1";
$route['posts/(:any)/(:any)'] = "posts/create/$1/$2";
// $route['dashboard/admin'] = "Dashboard/show_admin";
$route['sessions'] = "sessions/create";
$route['sessions/destroy'] = "sessions/destroy";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */