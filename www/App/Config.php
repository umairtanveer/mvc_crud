<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'db';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'myDb';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'user';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'test';

    /**
    * Database password
    * @var string
    */
    const FILE_PATH = 'Database/db.sql';
    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
}
