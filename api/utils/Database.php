<?php

class Database {
    public static $HOSTNAME = "localhost";
    public static $USERNAME = "root";
    public static $PASSWORD = "root";
    public static $DATABASE = "php_auth_api";

    public static function con(){
        $HOSTNAME = static::$HOSTNAME;
        $USERNAME = static::$USERNAME;
        $PASSWORD = static::$PASSWORD;
        $DATABASE = static::$DATABASE;

        $con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
        if(!$con) die("Database not connected.");

        return $con;
    }
}