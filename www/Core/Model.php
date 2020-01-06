<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base model
 *
 * PHP version 7.0
 */
abstract class Model
{
    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    public static function getDB()
    {
        static $db = null;

        if ($db === null) {
          $db = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD,Config::DB_NAME);
          if (!$db) {
              die("Connection failed: " . mysqli_connect_error());
          }
        }

        return $db;
    }
}
