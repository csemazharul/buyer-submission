<?php

namespace App\Database;

use App\Database\Migrations\BuyerMigration;

class DBMigrator
{
    public static function run()
    {
        (new BuyerMigration)->migrate();
    }
}
