<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Backup db
$routes->get('/backup', 'Backup::database');
$routes->get('/lay', 'Home::index1');

// Halaman utama
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');
$routes->get('about', 'Home::about');

// tugas
$routes->get('tugas', 'tugas::index');
$routes->get('tugas/create', 'tugas::create');
$routes->post('tugas/store', 'tugas::store');
$routes->get('tugas/edit/(:num)', 'tugas::edit/$1');
$routes->post('tugas/update/(:num)', 'tugas::update/$1');
$routes->get('tugas/delete/(:num)', 'tugas::delete/$1');
