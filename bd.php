<?php


function conexion()
{
    $dsn = "mysql:host=localhost; dbname=crudpdo";
    $user = 'root';
    $password = '';

    try {

        /* $dsn= "mysql:host=$host; dbname=$dbname"; */
        $bd = new PDO($dsn, $user, $password);
        return $bd;

    } catch (\PDOException $e) {
        echo "error ". $e->getMessage();
        
    }
}








