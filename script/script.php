<?php

include 'conexao.php';

// parâmetros de conexão com o banco de dados Firebird
$host = 'localhost';
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

// seleciona as informções das tabelas
$query = "
SELECT 
    E.NOME, 
    E.CGC_CPF,
    C.DOCUMENTO, 
    C.VALOR, 
    C.EMISSAO, 
    C.NOME_GRUPO,
    B.VR_PARCELA, 
    B.VENCTO, 
    B.BAIXA,
    D.VR_PARCELA AS VR_PARCELA_CED003, 
    D.VENCTO AS VENCTO_CED003, 
    D.BAIXA AS BAIXA_CED003,
    F.CNPJ_CPF, 
    F.DATA_PAGTO, 
    F.VALOR AS VALOR_MAN111, 
    F.DATA_LANC, 
    F.VENCTO AS VENCTO_MAN111
FROM EMD101 E
JOIN CRD111 C ON C.CGC_CPF = E.CGC_CPF
JOIN BXD111 B ON B.CGC_CPF = E.CGC_CPF AND B.DOCUMENTO = C.DOCUMENTO
JOIN CED003 D ON D.CGC_CPF = E.CGC_CPF AND D.DOCUMENTO = C.DOCUMENTO
JOIN CED004 G ON G.CGC_CPF = E.CGC_CPF AND G.DOCUMENTO = C.DOCUMENTO
JOIN MAN111 F ON F.CNPJ_CPF = E.CGC_CPF
WHERE E.CGC_CPF = :cpf
";

// seleciona as informações das tabelas
$query1 = "SELECT NOME, CGC_CPF FROM EMD101 WHERE CGC_CPF = :cpf";
$stmt1 = $pdo->prepare($query1);
$stmt2->bindValue(':cpf', $cpf);
$stmt1->execute();
$tabela1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$query2 = "SELECT 
    CGC_CPF, DOCUMENTO, VALOR, EMISSAO, NOME_GRUPO
FROM CRD111 WHERE CGC_CPF = :cpf";
$stmt2 = $pdo->prepare($query2);
$stmt2->bindValue(':cpf', $cpf);
$stmt2->execute();
$tabela2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$query3 = "SELECT 
    CGC_CPF, DOCUMENTO, VR_PARCELA, VENCTO, BAIXA
FROM BXD111 WHERE CGC_CPF = :cpf";
$stmt3 = $pdo->prepare($query3);
$stmt2->bindValue(':cpf', $cpf);
$stmt3->execute();
$tabela3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$query4 = "SELECT 
    CGC_CPF, DOCUMENTO, VR_PARCELA, VENCTO, BAIXA
FROM CED003 WHERE CGC_CPF = :cpf";
$stmt4 = $pdo->prepare($query4);
$stmt2->bindValue(':cpf', $cpf);
$stmt4->execute();
$tabela4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$query5 = "SELECT 
    CGC_CPF, DOCUMENTO, VR_PARCELA, VENCTO, BAIXA
FROM CED004 WHERE CGC_CPF = :cpf";
$stmt5 = $pdo->prepare($query5);
$stmt2->bindValue(':cpf', $cpf);
$stmt5->execute();
$tabela5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

$query6 = "SELECT 
    LANCTO, CNPJ_CPF, DATA_PAGTO, VALOR, DATA_LANC, VENCTO
FROM MAN111 WHERE CGC_CPF = :cpf";
$stmt6 = $pdo->prepare($query6);
$stmt2->bindValue(':cpf', $cpf);
$stmt6->execute();
$tabela6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);

// verifica se a consulta da primeira tabela retornou os resultados
if($stmt1->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $tabela1 = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $tabela1[] = $row;
    }

    // exibe os dados
    var_dump($tabela1);
} else {
    echo 'Nenhum dado encontrado na tabela 1';
}

// verifica se a consulta da primeira tabela retornou os resultados
if($stmt2->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $tabela2 = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $tabela2[] = $row;
    }

    // exibe os dados
    var_dump($tabela2);
} else {
    echo 'Nenhum dado encontrado na tabela 2';
}

// verifica se a consulta da primeira tabela retornou os resultados
if($stmt3->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $tabela3 = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $tabela3[] = $row;
    }

    // exibe os dados
    var_dump($tabela3);
} else {
    echo 'Nenhum dado encontrado na tabela 3';
}

// verifica se a consulta da primeira tabela retornou os resultados
if($stmt4->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $tabela4 = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt4->fetch(PDO::FETCH_ASSOC)) {
        $tabela4[] = $row;
    }

    // exibe os dados
    var_dump($tabela4);
} else {
    echo 'Nenhum dado encontrado na tabela 4';
}

// verifica se a consulta da primeira tabela retornou os resultados
if($stmt5->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $tabela5 = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt5->fetch(PDO::FETCH_ASSOC)) {
        $tabela5[] = $row;
    }

    // exibe os dados
    var_dump($tabela5);
} else {
    echo 'Nenhum dado encontrado na tabela 5
    ';
}

// verifica se a consulta da primeira tabela retornou os resultados
if($stmt6->rowCount() > 0) {
    // array para armazenar os dados da tabela
    $tabela6 = array();

    // percorre os resultados da consulta e adiciona os dados no array
    while($row = $stmt6->fetch(PDO::FETCH_ASSOC)) {
        $tabela6[] = $row;
    }

    // exibe os dados
    var_dump($tabela6);
} else {
    echo 'Nenhum dado encontrado na tabela 6';
}


// importa a biblioteca PHPExcel
require_once 'PHPExcel/PHPExcel.php';

// verifica se a consulta retornou os resultados da tabela 1
if($stmt1->rowCount() > 0) {
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

// verifica se a consulta retornou os resultados da tabela 2
if($stmt2->rowCount() > 0) {
    // cria uma nova planilha
    $objPHPExcel = new PHPExcel();

    //define o nome da planilha
    $objPHPExcel->getActiveSheet()->setTitle('CRD111');

    // adiciona o cabeçalho da tabela
    $objPHPExcel->getActiveSheet()
        ->setCellValue('C1', 'DOCUMENTO')                                    
        ->setCellValue('D1', 'VALOR');
        ->setCellValue('E1', 'EMISSAO');
        ->setCellValue('F1', 'NOME_GRUPO');

    // adiciona as informações do array às células correspondentes
    $row = 2;
    foreach($dados as $CRD111) {
        $objPHPExcel->getActiveSheet()
            ->setCellValue('C'.$row, $CRD111['DOCUMENTO'])
            ->setCellValue('D'.$row, $CRD111['VALOR']);
            ->setCellValue('E'.$row, $CRD111['EMISSAO'])
            ->setCellValue('F'.$row, $CRD111['NOME_GRUPO']);
        $row++;
    }

    // define o formato do arquivo como .csv
    $objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'CSV');
    $objWriter->save('financeiro.csv');

    echo 'Planilha gerada com sucesso';
} else {
    echo 'Nenhum dado encontrado';
}

// verifica se a consulta retornou os resultados da tabela 3
if($stmt3->rowCount() > 0) {
    // cria uma nova planilha
    $objPHPExcel = new PHPExcel();

    //define o nome da planilha
    $objPHPExcel->getActiveSheet()->setTitle('BXD111');

    // adiciona o cabeçalho da tabela
    $objPHPExcel->getActiveSheet()
        ->setCellValue('G1', 'VR_PARCELA')                                    
        ->setCellValue('H1', 'VENCTO');
        ->setCellValue('I1', 'BAIXA');

    // adiciona as informações do array às células correspondentes
    $row = 2;
    foreach($dados as $CRD111) {
        $objPHPExcel->getActiveSheet()
            ->setCellValue('G'.$row, $BXD111['VR_PARCELA'])
            ->setCellValue('H'.$row, $BXD111['VENCTO']);
            ->setCellValue('I'.$row, $BXD111['EMISSAO']);
        $row++;
    }

    // define o formato do arquivo como .csv
    $objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'CSV');
    $objWriter->save('financeiro.csv');

    echo 'Planilha gerada com sucesso';
} else {
    echo 'Nenhum dado encontrado';
}

// verifica se a consulta retornou os resultados da tabela 6
if($stmt6->rowCount() > 0) {
    // cria uma nova planilha
    $objPHPExcel = new PHPExcel();

    //define o nome da planilha
    $objPHPExcel->getActiveSheet()->setTitle('MAN111');

    // adiciona o cabeçalho da tabela
    $objPHPExcel->getActiveSheet()
        ->setCellValue('J1', 'LANCTO');                                  
        ->setCellValue('L1', 'DATA_PAGTO');
        ->setCellValue('M1', 'VALOR');
        ->setCellValue('N1', 'DATA_LANC');
        ->setCellValue('O1', 'VENCTO');

    // adiciona as informações do array às células correspondentes
    $row = 2;
    foreach($dados as $CRD111) {
        $objPHPExcel->getActiveSheet()
            ->setCellValue('J'.$row, $MAN111['LANCTO']);          
            ->setCellValue('L'.$row, $MAN111['DATA_PAGTO']);
            ->setCellValue('M'.$row, $MAN111['VALOR']);
            ->setCellValue('N'.$row, $MAN111['DATA_LANC']);
            ->setCellValue('O'.$row, $MAN111['VENCTO']);
        $row++;
    }

    // define o formato do arquivo como .csv
    $objWriter = PHPExcel_IOFactory:: createWriter($objPHPExcel, 'CSV');
    $objWriter->save('financeiro.csv');

    echo 'Planilha gerada com sucesso';
} else {
    echo 'Nenhum dado encontrado';
}