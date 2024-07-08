<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('register', 'Login::indexRegister');
$routes->post('register', 'userPengguna::addUser');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::login');
$routes->get('logout', 'Login::logout');

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

