<?php

$dsn = 'firebird:dbname=host:/C/Users/Lenovo/Documents/Shinier/BancoTeste/MEU_BANCO_DE_DADOS.FDB';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $conn = new PDO($dsn, $username, $password);
    $drivers = $conn->getAvailableDrivers();
    if(in_array('pdo_firebird', $drivers)) {
        echo "Está sendo usado o driver PDO_Firebird";
    } elseif(in_array('ibase', $drivers)) {
        echo "Está sendo usado o driver IBASE";
    } else {
        echo "Não foi possível determinar o driver usado";
    }
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
}