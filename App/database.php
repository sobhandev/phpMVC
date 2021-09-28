<?php

class database
{
    protected $db;
    public function __construct($host = "localhost" , $database = "test" , $user = "root" , $password = "")
    {
        $this->db = new PDO("mysql:host=$host;dbname=$database" , $user , $password);
        return $this->db;
    }
}