<?php

namespace Mamoi\Resources;

class Db
{
    private $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=db; dbname=ingredients', 'root', 'password');
    }

    /**  Getter for database connection
     *
     * @return \PDO instantiated object which contains database credentials
     */
    public function getConnection()
    {
        return $this->db;
    }
}

