<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'Admin::login');
$routes->post('/admin/proses_login', 'Admin::proses_login');
$routes->get('/logout', 'Admin::logout');

$routes->get('/warga', 'Warga::index');
$routes->get('/warga/tambah', 'Warga::tambah_warga');
$routes->post('/warga/proses_tambah_warga', 'Warga::proses_tambah_warga');
$routes->get('/warga/edit/(:num)', 'Warga::edit_warga/$1');
$routes->post('/warga/proses_edit_warga/(:num)', 'Warga::proses_edit_warga/$1');
$routes->get('/warga/delete/(:num)', 'Warga::delete_warga/$1');

// KAS
$routes->get('/kas/transaksi', 'Kas::transaksi');
$routes->get('/kas/tambah-transaksi', 'Kas::tambah_transaksi');
$routes->post('/kas/proses_tambah_transaksi', 'Kas::proses_tambah_transaksi');
$routes->get('/kas/edit/(:num)', 'Kas::edit_transaksi/$1');
$routes->post('/kas/proses_edit_transaksi/(:num)', 'Kas::proses_edit_transaksi/$1');
$routes->get('/kas/delete/(:num)', 'Kas::delete_transaksi/$1');

$routes->get('/kas/laporan-kas', 'Kas::laporan_kas');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
