<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', 'karineerwan');
        return $db;
    }
}