<?php

return [
    'class' => 'yii\db\Connection',

    // 'dsn' => 'mysql:host=localhost;dbname=cleaning_service',

    // только для OSP 6.x
    'dsn' => 'mysql:host=MariaDB-11.2;dbname=cleaning_service',
    'username' => 'root', //login
    'password' => '', //password
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
