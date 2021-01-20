<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// for test only
$route['bookings/check_timing'] = 'bookings/check_timing';

// start Stripe Controller
$route['stripe'] = 'stripe';
$route['payment/(:any)'] = 'stripe/payment/$1';
// end Stripe Controller

// start Paypal Controller
$route['paypal'] = 'paypal';
$route['paypal/process'] = 'paypal/process';
$route['paypal/success'] = 'paypal/success';
$route['paypal/cancel'] = 'paypal/cancel';

// end Paypal Controller


// start Bookings Controller
$route['bookings'] = 'bookings';
$route['save_client_signature'] = 'bookings/save_client_signature';
$route['load_booking_form'] = 'bookings/load_booking_form';
$route['bookings/get_timings'] = 'bookings/get_timings';
$route['booking/create'] = 'bookings/create_booking_by_admin/';
$route['booking_requests'] = 'bookings/booking_requests';
$route['create_booking'] = 'bookings/create_booking/';
$route['create_booking/(:any)/(:any)'] = 'bookings/create_booking/$1/$2';
$route['booking/(:any)/(:any)'] = 'bookings/view/$1/$2';
// end Bookings Controller

// start Users Controller
$route['log_out'] = 'users/log_out';
$route['submit_email'] = 'users/submit_email';
$route['submit_email/(:any)/(:any)'] = 'users/submit_email/$1/$2';
$route['sign_up/(:any)/(:any)'] = 'users/verify_email/$1/$2';
// end Users Controller

// start Plans Controller
$route['home'] = 'services';
// end Plans Controller

// start Admin Controller
$route['send_contract/(:any)/(:any)'] = 'users/send_contract/$1/$2';
$route['contract/(:any)/(:any)/(:any)'] = 'users/verify_contract/$1/$2/$3';
$route['cancel_booking_request/(:any)'] = 'admin/cancel_booking_request/$1';
$route['admin/logout'] = 'admin/logout';
$route['admin/change_password'] = 'admin/change_password';
$route['admin/login'] = 'admin/login';
$route['admin'] = 'admin';
// end Admin Controller

// start Events Controller
$route['create_(:any)'] = 'events/create/$1';
$route['events/create_ajax'] = 'events/create_ajax';
$route['events/upload_images'] = 'events/upload_images';
$route['events/upload_videos'] = 'events/upload_videos';
$route['bands'] = 'events';
// end Events Controller

// $route['default_controller'] = 'pages/view';
$route['default_controller'] = 'services';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
