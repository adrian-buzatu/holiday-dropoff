<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "homepage";
$route['404_override'] = '';
$route['news'] = 'news';
$route['news/(:any)'] = 'news/view/$1';
$route['booking'] = "booking";
$route['booking/process'] = "booking/process_booking";
$route['booking/success'] = "booking/success";
$route['booking/(:any)'] = 'booking/index/$1';
$route['(:any)'] = 'pages/view/$1';
$route['our-camps'] = "ourcamps";
$route['contact-us'] = "contactus";
$route['contact-us/process'] = "contactus/process";
$route['contact-us'] = "contactus";
$route['login'] = "login";
$route['login/forgot'] = "login/forgot";
$route['register'] = "register";
$route['logout'] = "logout";
$route['profile'] = "profile";
$route['profile/add_child'] = "profile/add_child";
$route['profile/update_child'] = "profile/update_child";
$route['profile/delete_child'] = "profile/delete_child";
$route['profile/get_child'] = "profile/get_child";

/* End of file routes.php */
/* Location: ./application/config/routes.php */