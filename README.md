# psel-shinier-2023

## Desafio:
Acesse a base de dados, extraia as informações pertinentes das tabelas e organize-as na planilha modelo fornecida. Depois de concluir essa etapa, 
envie a planilha modelo via API disponibilizada para o teste.

## Comandos usados:

==> Comando para acessar o banco de dados no ISQL Tool:

 CONNECT C:\Users\Lenovo\Documents\Shinier\BancoTeste\MEU_BANCO_DE_DADOS.FDB USER 'SYSDBA' PASSWORD 'masterkey';


==> Comando para verificar quais tabelas existem no banco de dados (digitar no ISQL Tool):

SELECT RDB$RELATION_NAME
FROM RDB$RELATIONS
WHERE RDB$SYSTEM_FLAG = 0 AND RDB$VIEW_BLR IS NULL
ORDER BY RDB$RELATION_NAME;

==> Comando para exibir tabelas:

SHOW TABLES;

==> Comando para extrair as informações do bd gerando uma planilha no excel:

SELECT * FROM CLIENTES INTO 'C:\Users\Lenovo\Documents\Shinier\BancoTeste\clientes.csv' 
FIELDS TERMINATED BY ';' ENCLOSED BY '"' ESCAPE BY '\\' ;


XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

====> NO SGBD

==> Comandos que acessa cpf das colunas selecionadas:

SELECT CGC_CPF FROM BXD111
UNION ALL 
SELECT CGC_CPF FROM CED003
UNION ALL  
SELECT CGC_CPF FROM CED004
UNION ALL 
SELECT CGC_CPF FROM CRD111
UNION ALL 
SELECT CNPJ_CPF FROM MAN111
UNION ALL 
SELECT CNPJ_CPF FROM MAN101;


==> Comando para saber tudo o que relacionado a um cpf específico dentro de uma tabela:

SELECT * FROM CED004 WHERE CGC_CPF = '017.988.291-00';
