<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('register', 'Auth::indexRegister');
$routes->post('register', 'Auth::register');

$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index');

$routes->get('materi', 'Materi::index');
$routes->get('materi/add', 'Materi::Add');
$routes->post('materi/add', 'Materi::Save');
$routes->get('materi/edit/(:num)', 'Materi::showEdit/$1');
$routes->post('materi/edit/(:num)', 'Materi::Edit/$1');
$routes->post('materi/delete/(:num)', 'Materi::Delete/$1');

$routes->get('pengguna', 'User::index');
$routes->get('pengguna/add', 'User::showAddUser');
$routes->post('pengguna/add', 'User::addUser');
$routes->get('hapususer/(:segment)', 'Login::destroy/$1');

$routes->get('transaksi', 'Transaksi::index');
$routes->get('transaksi/edit/(:num)', 'Transaksi::showEdit/$1');
$routes->post('transaksi/edit/(:num)', 'Transaksi::edit/$1');
$routes->get('bukti_pembayaran', 'Transaksi::showBukti');

$routes->get('rekening', 'Rekening::index');
$routes->get('rekening/add', 'Rekening::showAddRekening');
$routes->post('rekening/add', 'Rekening::add');
$routes->get('rekening/edit/(:num)', 'Rekening::showEdit/$1');
$routes->post('rekening/edit/(:num)', 'Rekening::edit/$1');
$routes->post('rekening/delete/(:num)', 'Rekening::delete/$1');

$routes->get('course/(:num)', 'Course::index/$1');

$routes->get('checkout/(:num)', 'Checkout::index/$1');
$routes->post('checkout', 'Checkout::checkout');

$routes->get('transaction', 'Transaction::index');
$routes->post('bukti/upload', 'Transaction::uploadBukti');
$routes->get('bukti/(:num)', 'Transaction::showBukti/$1');

$routes->get('profile', 'Profile::index');
$routes->get('profile/edit', 'Profile::showEdit');
$routes->post('profile/edit', 'Profile::edit');

