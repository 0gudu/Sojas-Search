<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd';
$user = 'root';
$pass = '';

// Nome da tabela
$tabela = 'dados';

try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nomedb = $_POST['nome'];
    $stmt = $pdo->prepare("INSERT INTO databasess(names) VALUES (:nome)");
    $stmt->bindValue(':nome', $nomedb, PDO::PARAM_STR);
    $stmt->execute();
    // Caminho do arquivo CSV
    $arquivo_csv = $_POST['caminho'];

    // Montar a consulta SQL de inserção
    $colunas = ['fds', 'urls', 'email','senha']; // Substitua pelos nomes reais das suas colunas
    $sql = "LOAD DATA INFILE :arquivo
            INTO TABLE $tabela
            FIELDS TERMINATED BY ':'
            LINES TERMINATED BY '\n'
            (" . implode(', ', $colunas) . ")";

    // Preparar e executar a consulta SQL
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':arquivo', $arquivo_csv, PDO::PARAM_STR);
    $stmt->execute();

    echo "Dados inseridos com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
