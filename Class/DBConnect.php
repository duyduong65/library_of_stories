<?php

class DBConnect
{
    protected $dsn;
    protected $user;
    protected $password;

    public function __construct($dsn, $user, $password)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
        return $conn;
    }
}