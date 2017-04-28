<?php
// Routes
$app->get('/', '\Acme\Controllers\HomeController');

// admin
$app->get('/admin', '\Acme\Controllers\Admin\IndexController');
$app->get('/admin/foo', '\Acme\Controllers\Admin\FooController');
$app->get('/admin/user/register', '\Acme\Controllers\Admin\User\RegisterController');
$app->get('/admin/user/login', '\Acme\Controllers\Admin\User\LoginController');

// agent
$app->get('/agent', '\Acme\Controllers\Agent\IndexController');
