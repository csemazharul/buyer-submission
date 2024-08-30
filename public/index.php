<?php

use App\Database\DBMigrator;
use App\Dotenv;

require '../vendor/autoload.php';

if (!file_exists('../.env')) {
    echo 'Please create an .env file in the root directory';
    die;
}

Dotenv::load('../.env');

DBMigrator::run();

$router = require '../src/Routes/web.php';
