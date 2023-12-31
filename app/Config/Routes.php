<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/register', 'Dashboard::register');
$routes->get('/registerCh', 'Dashboard::registerCh');
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/account', 'Dashboard::account');
$routes->get('/tahunAjaran', 'Dashboard::tahunAjaran');
$routes->get('/mataAjar', 'Dashboard::mataAjar');
$routes->get('/kelas', 'Dashboard::kelas');
$routes->get('/kurikulum', 'Dashboard::kurikulum');
$routes->get('/dataPengajar', 'Dashboard::dataPengajar');
$routes->get('/dataPesertaDidik', 'Dashboard::dataPesertaDidik');
$routes->get('/dataKelas', 'Dashboard::dataKelas');
$routes->get('/siswaKelas/(:num)/(:num)', 'Dashboard::siswaKelas/$1/$2');
$routes->get('/krs', 'Dashboard::krs');
$routes->get('/krsKelas/(:num)/(:num)', 'Dashboard::krsKelas/$1/$2');
$routes->get('/jadwalPengajaran', 'Dashboard::jadwalPengajaran');
$routes->get('/absensi', 'Dashboard::absensi');
$routes->get('/absensiRekapitulasi', 'Dashboard::absensiRekapitulasi');
$routes->get('/absensiRekapitulasiKelas/(:num)/(:num)', 'Dashboard::absensiRekapitulasiKelas/$1/$2');
$routes->get('/nilai', 'Dashboard::nilai');
$routes->get('/aktivasi', 'Dashboard::aktivasi');

$routes->get('/absensi-dompdf', 'PdfController::generatePDF');
$routes->get('/absensi-fpdf', 'PdfController::generateFPDF');

$routes->get('/absensiKelas-tc/(:num)/(:num)', 'TcpdfController::generatePDF/$1/$2');
$routes->get('/absensiMataAjar-tc/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)/(:num)', 'TcpdfController::generateMataAjarPDF/$1/$2/$3/$4/$5/$6/$7');

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
