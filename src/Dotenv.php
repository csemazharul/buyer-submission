<?php

namespace App;

// if (!\defined('ABSPATH')) {
//     exit;
// }

final class Dotenv
{
    public static function load($path = '')
    {
        if (!file_exists($path)) {
            return false;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $position = strpos($line, '#');

            if ($position !== false) {
                $line = substr($line, 0, $position);
            }

            list($name, $value) = explode('=', trim($line), 2);

            $name = trim($name);

            $value = trim($value);

            if (is_numeric($value)) {
                $value = $value + 0;
            } elseif (strtolower($value) == 'true' || strtolower($value) == 'false') {
                $value = strtolower($value) == 'true';
            }

            if (!\array_key_exists($name, $_ENV)) {
                putenv("$name=$value");
            }
        }
    }

}
