<?php
require_once "../includes/connec.php";


// Função para verificar se uma tabela possui índices
function tabelaPossuiIndices($pdo, $tableName) {
    $stmt = $pdo->prepare("SHOW INDEX FROM $tableName");
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

// Nome da tabela que você quer verificar os índices
$tableName = 'dados';

// Verifica se a tabela possui índices
if (tabelaPossuiIndices($pdo, $tableName)) {
    echo "A tabela $tableName já possui índices.";
} else {
    $stmt = $pdo->prepare('CREATE INDEX idx_id ON dados (id_dados);');
    $stmt->execute();
    $stmt = $pdo->prepare('CREATE INDEX idx_urls ON dados (urls(255)); ');
    $stmt->execute();
    $stmt = $pdo->prepare('CREATE INDEX idx_email ON dados (email(255));');
    $stmt->execute();
    $stmt = $pdo->prepare('CREATE INDEX idx_senha ON dados (senha(255));');
    $stmt->execute();
    echo "Indices inseridos";
}

?>
<a href="../../index.php">voltar</a>
