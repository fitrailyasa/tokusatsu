<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_AUTH_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

        'sqlite2' => [
            'driver' => 'sqlite',
            'url' => env('DB_AUTH_URL'),
            'database' => env('DB_AUTH_DATABASE', database_path('database2.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_AUTH_FOREIGN_KEYS', true),
        ],

        'mysql2' => [
            'driver' => 'mysql',
            'url' => env('DB_AUTH_URL'),
            'host' => env('DB_AUTH_HOST', '127.0.0.1'),
            'port' => env('DB_AUTH_PORT', '3306'),
            'database' => env('DB_AUTH_DATABASE', 'laravel'),
            'username' => env('DB_AUTH_USERNAME', 'root'),
            'password' => env('DB_AUTH_PASSWORD', ''),
            'unix_socket' => env('DB_AUTH_SOCKET', ''),
            'charset' => env('DB_AUTH_CHARSET', 'utf8mb4'),
            'collation' => env('DB_AUTH_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb2' => [
            'driver' => 'mariadb',
            'url' => env('DB_AUTH_URL'),
            'host' => env('DB_AUTH_HOST', '127.0.0.1'),
            'port' => env('DB_AUTH_PORT', '3306'),
            'database' => env('DB_AUTH_DATABASE', 'laravel'),
            'username' => env('DB_AUTH_USERNAME', 'root'),
            'password' => env('DB_AUTH_PASSWORD', ''),
            'unix_socket' => env('DB_AUTH_SOCKET', ''),
            'charset' => env('DB_AUTH_CHARSET', 'utf8mb4'),
            'collation' => env('DB_AUTH_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql2' => [
            'driver' => 'pgsql',
            'url' => env('DB_AUTH_URL'),
            'host' => env('DB_AUTH_HOST', '127.0.0.1'),
            'port' => env('DB_AUTH_PORT', '5432'),
            'database' => env('DB_AUTH_DATABASE', 'laravel'),
            'username' => env('DB_AUTH_USERNAME', 'root'),
            'password' => env('DB_AUTH_PASSWORD', ''),
            'charset' => env('DB_AUTH_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv2' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_AUTH_URL'),
            'host' => env('DB_AUTH_HOST', 'localhost'),
            'port' => env('DB_AUTH_PORT', '1433'),
            'database' => env('DB_AUTH_DATABASE', 'laravel'),
            'username' => env('DB_AUTH_USERNAME', 'root'),
            'password' => env('DB_AUTH_PASSWORD', ''),
            'charset' => env('DB_AUTH_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_AUTH_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_AUTH_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

        'sqlite3' => [
            'driver' => 'sqlite',
            'url' => env('DB_CONTENT_URL'),
            'database' => env('DB_CONTENT_DATABASE', database_path('database3.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_CONTENT_FOREIGN_KEYS', true),
        ],

        'mysql3' => [
            'driver' => 'mysql',
            'url' => env('DB_CONTENT_URL'),
            'host' => env('DB_CONTENT_HOST', '127.0.0.1'),
            'port' => env('DB_CONTENT_PORT', '3306'),
            'database' => env('DB_CONTENT_DATABASE', 'laravel'),
            'username' => env('DB_CONTENT_USERNAME', 'root'),
            'password' => env('DB_CONTENT_PASSWORD', ''),
            'unix_socket' => env('DB_CONTENT_SOCKET', ''),
            'charset' => env('DB_CONTENT_CHARSET', 'utf8mb4'),
            'collation' => env('DB_CONTENT_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb3' => [
            'driver' => 'mariadb',
            'url' => env('DB_CONTENT_URL'),
            'host' => env('DB_CONTENT_HOST', '127.0.0.1'),
            'port' => env('DB_CONTENT_PORT', '3306'),
            'database' => env('DB_CONTENT_DATABASE', 'laravel'),
            'username' => env('DB_CONTENT_USERNAME', 'root'),
            'password' => env('DB_CONTENT_PASSWORD', ''),
            'unix_socket' => env('DB_CONTENT_SOCKET', ''),
            'charset' => env('DB_CONTENT_CHARSET', 'utf8mb4'),
            'collation' => env('DB_CONTENT_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql3' => [
            'driver' => 'pgsql',
            'url' => env('DB_CONTENT_URL'),
            'host' => env('DB_CONTENT_HOST', '127.0.0.1'),
            'port' => env('DB_CONTENT_PORT', '5432'),
            'database' => env('DB_CONTENT_DATABASE', 'laravel'),
            'username' => env('DB_CONTENT_USERNAME', 'root'),
            'password' => env('DB_CONTENT_PASSWORD', ''),
            'charset' => env('DB_CONTENT_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv3' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_CONTENT_URL'),
            'host' => env('DB_CONTENT_HOST', 'localhost'),
            'port' => env('DB_CONTENT_PORT', '1433'),
            'database' => env('DB_CONTENT_DATABASE', 'laravel'),
            'username' => env('DB_CONTENT_USERNAME', 'root'),
            'password' => env('DB_CONTENT_PASSWORD', ''),
            'charset' => env('DB_CONTENT_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_CONTENT_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_CONTENT_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
