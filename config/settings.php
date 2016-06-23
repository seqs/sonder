<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // Database
        'db' => [
            'database_type' => 'mysql',
            'database_name' => 'sonder',
            'server' => 'localhost',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ],

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
    ],
];
