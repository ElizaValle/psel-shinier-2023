<?php

include 'conexao.php';

// parâmetros de conexão com o banco de dados Firebird
$host = '192.168.0.6';
$dbname = 'C:\Users\Lenovo\Documents\Shinier\BancoTeste\MEU_BANCO_DE_DADOS.FDB';
$username = 'SYSDBA';
$password = 'masterkey';

// string de conexão com o PDO

$connStr = "firebird:dbname={$dbname};host={$host}";

// cria a conexão com o banco de dados
try {
    $conn = new PDO($connStr, $username, $password);
} catch(PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
}

// query sql para buscar os dados na tabela "EMD101"
$sql = "SELECT NOME, CGC_CPF FROM EMD101";
$stmt = $conn->query($sql);

// verifica se a consulta retornou os resultados
if($stmt->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $dados = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dados[] = $row;
    }

    // exibe os dados
    var_dump($dados);
} else {
    echo 'Nenhum dado encontrado';
}

// importa a biblioteca PHPExcel
require_once 'PHPExcel/PHPExcel.php';

// verifica se a consulta retornou os resultados
if($stmt->rowCount() > 0) {
    // cria uma nova planilha
    $objPHPExcel = new PHPExcel();

    //define o nome da planilha
    $objPHPExcel->getActiveSheet()->setTitle('EMD101');

    // adiciona o cabeçalho da tabela
    $objPHPExcel->getActiveSheet()
        ->setCellValue('A1', 'NOME')
        ->setCellValue('B1', 'CPF');

    // adiciona as informações do array às células correspondentes
    $row = 2;
    foreach($dados as $EMD101) {
        $objPHPExcel->getActiveSheet()
            ->setCellValue('A'.$row, $EMD101['NOME'])
            ->setCellValue('B'.$row, $EMD101['CGC_CPF']);
        $row++;
    }

    // define o formato do arquivo como .csv
    $objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'CSV');
    $objWriter->save('EMD101.csv');

    echo 'Planilha gerada com sucesso';
} else {
    echo 'Nenhum dado encontrado';
}