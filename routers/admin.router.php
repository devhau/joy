<?php

$router->get('/', 'Admin/AdminDashboard@getIndex');
// User Manager
$router->get('/user', 'Admin/AdminUser@getIndex');
$router->get('/user/edit/{id}', 'Admin/AdminUser@getEdit');
$router->post('/user/edit/{id}', 'Admin/AdminUser@postEdit');
$router->get('/user/add', 'Admin/AdminUser@getAdd');
$router->post('/user/add', 'Admin/AdminUser@postAdd');
$router->get('/user/delete/{id}', 'Admin/AdminUser@getDelete');

// Product Manager
$router->get('/product', 'Admin/AdminProduct@getIndex');
$router->get('/product/edit/{id}', 'Admin/AdminProduct@getEdit');
$router->post('/product/edit/{id}', 'Admin/AdminUser@postEdit');
$router->get('/product/add', 'Admin/AdminProduct@getAdd');
$router->post('/product/add', 'Admin/AdminProduct@postAdd');
$router->get('/product/delete/{id}', 'Admin/AdminProduct@getDelete');
//
$router->get('/create-database', function () {
    require_once(PATH_ROOT . 'databases/init.php');
});
