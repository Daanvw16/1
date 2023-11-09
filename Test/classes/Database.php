<?php

class Database
{
    public $connection;

    function __construct() {
        $mysqli = new mysqli("localhost","root","","bijles-php");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }

        $this->connection = $mysqli;
    }
}