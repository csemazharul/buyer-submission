<?php

namespace App;

class Utility
{
    public static function view($path, $data = [])
    {
        extract($data);

        include "Views/$path.php";
    }
}
