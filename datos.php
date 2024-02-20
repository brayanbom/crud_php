<?php


include 'bd.php';

$conec =  conexion();
$query = $conec->prepare("SELECT * FROM usuarios");
$query->execute(); 
$result = $query->fetchAll();
