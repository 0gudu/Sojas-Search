<?php

require_once "../../includes/connec.php";
if ($pr == 1){
    header("location: ../config.php");
}

$tabela = 'dados';

try {
    // Conectar ao banco de dados usando PDO
    $nomedb = $_POST['nome'];
    $stmt = $pdo->prepare("INSERT INTO databasess(names) VALUES (:nome)");
    $stmt->bindValue(':nome', $nomedb, PDO::PARAM_STR);
    $stmt->execute();


    $arquivo_csv = $_POST['caminho'];

  
    $colunas = ['fds', 'urls', 'email', 'senha'];
    $sql = "LOAD DATA LOCAL INFILE :arquivo
            INTO TABLE $tabela
            FIELDS TERMINATED BY ':'
            LINES TERMINATED BY '\n'
            (" . implode(', ', $colunas) . ")";


    // Preparar e executar a consulta SQL
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':arquivo', $arquivo_csv, PDO::PARAM_STR);
    $stmt->execute();

    echo "Dados";

} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>