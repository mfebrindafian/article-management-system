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

//Routes Ke views dan controller Akses
$routes->get('/', 'masterAkses::index'); ///ubahhhh disiniii untuk ke halaman under construction buat jadi $routes->get('/', 'Home::index');
//routes Akses Aplikasi
$routes->post('/login', 'masterAkses::open');
// routes Ke ganti Password default
$routes->post('/gantiPasswordDefault', 'masterAkses::gantiPasswordDefault');
//routes Logout
$routes->get('/logout', 'masterAkses::logout');
//Routes Ke views dan controller Dashboard
$routes->get('/dashboard', 'masterDashboard::index');
//Routes Ke views dan controller Dashboard
$routes->get('/profile', 'masterUser::profile');
//routes ke update data user by user
$routes->post('/updateProfileByUser', 'masterUser::updateProfileByUser');
//Routes ke ganti password user
$routes->post('/gantiPasswordByUser', 'masterUser::gantiPasswordByUser');
//Routes Ke views dan controller Kelola Master
$routes->get('/masterUser', 'masterKelolaMaster::masterUser');
//Routes untuk menampilkan data berdasarkan data user yang dipilih
$routes->get('/showDataUser/(:segment)', 'masterKelolaMaster::showDataUser/$1');
//routes update level dan aktivasi pada user
$routes->post('/updateRoleAktivasi', 'masterKelolaMaster::updateRoleAktivasi');
//routes update level dan tambah level user
$routes->post('/tambahLevelUser', 'masterKelolaMaster::tambahLevelUser');
//routes untuk reset password user
$routes->post('/resetPasswordUser', 'masterKelolaMaster::resetPasswordUser');
//routes untuk hapus level user
$routes->post('/hapusLevelUser', 'masterKelolaMaster::hapusLevelUser');
//Routes Ke views dan controller Kelola Master Tambah
$routes->post('/tambahUser', 'masterKelolaMaster::tambahUser');
//Routes Ke views dan controller Sistem
$routes->get('/kelolaLevel', 'masterSistem::kelolaLevel');
//routes ke editKelolaMenu bagi level tertentu
$routes->get('/editKelolaLevel/(:segment)', 'masterSistem::editKelolaLevel/$1');
$routes->post('/updateKelolaLevel/(:segment)', 'masterSistem::updateKelolaLevel/$1');
//routes ke save level baru yang dibuat
$routes->post('/saveLevel', 'masterSistem::saveLevel');
//routes ke update nama level yang ada di list
$routes->post('/updateNamaLevel', 'masterSistem::updateNamaLevel');
$routes->get('/kelolaMenu', 'masterSistem::kelolaMenu');
$routes->get('/kelolaSubMenu', 'masterSistem::kelolaSubMenu');
//Routes ke update dan controller sistem
$routes->post('/updateMenu', 'masterSistem::updateMenu');
$routes->post('/updateSubmenu', 'masterSistem::updateSubmenu');
//Routes ke save dan controller sistem
$routes->post('/saveMenu', 'masterSistem::saveMenu');
$routes->post('/saveSubmenu', 'masterSistem::saveSubmenu');
//routes ke switch level akun dan controller master akses
$routes->post('/switchLevel', 'masterAkses::switchLevel');

///batas routes khusus aplikasi portal berita
// route ke entry Berita
$routes->get('/entryBerita', 'masterBerita::entryBerita');
$routes->get('/reviewBerita', 'masterBerita::reviewBerita');
$routes->get('/publishBerita', 'masterBerita::publishBerita');
$routes->get('/detailBerita/(:segment)', 'masterBerita::detailBerita/$1');
$routes->get('/detailBeritaReviewer/(:segment)', 'masterBerita::detailBeritaReviewer/$1');

$routes->get('/downloadFoto/(:segment)', 'masterBerita::downloadFoto/$1');
$routes->get('/finalReview/(:segment)', 'masterBerita::finalReview/$1');
$routes->get('/reviewUlang/(:segment)', 'masterBerita::reviewUlang/$1');
$routes->get('/tambahBerita', 'masterBerita::tambahBerita');
$routes->get('/editBerita/(:segment)', 'masterBerita::editBerita/$1');


$routes->post('/uploadBerita', 'masterBerita::uploadBerita');
$routes->post('/updateBerita', 'masterBerita::updateBerita');


$routes->post('/ubahStatusReview', 'masterBerita::ubahStatusReview');
$routes->post('/rejectBeritaByReviewer', 'masterBerita::rejectBeritaByReviewer');
$routes->post('/cancelBerita', 'masterBerita::cancelBerita');
$routes->get('/downloadBerita/(:segment)', 'masterBerita::downloadBerita/$1');
$routes->get('/downloadBeritaFinal/(:segment)', 'masterBerita::downloadBeritaFinal/$1');

$routes->post('/uploadHasiReview', 'masterBerita::uploadHasiReview');
$routes->post('/uploadHasiReviewUlang', 'masterBerita::uploadHasiReviewUlang');
$routes->post('/sendLinkBerita', 'masterBerita::sendLinkBerita');
$routes->post('/editLinkBerita', 'masterBerita::editLinkBerita');
$routes->post('/rejectBeritaByPublisher', 'masterBerita::rejectBeritaByPublisher');

$routes->get('/monitoring/(:segment)', 'masterBerita::monitoring/$1');

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
