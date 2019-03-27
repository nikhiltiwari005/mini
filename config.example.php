<?php

return [
    'database' => [
        'name' => 'test',
        'username' => 'testUser',
        'password' => 'testPass',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];
