<?php

require_once "../../includes/connec.php";
if ($pr == 1){
    header("location: ../config.php");
}
// Informações de conexão com o banco de dados

// Nome da tabela
$tabela = 'dados';

try {
    // Conectar ao banco de dados usando PDO
    $nomedb = $_POST['nome'];
    $stmt = $pdo->prepare("INSERT INTO databasess(names) VALUES (:nome)");
    $stmt->bindValue(':nome', $nomedb, PDO::PARAM_STR);
    $stmt->execute();

    // Caminho do arquivo CSV
    $arquivo_csv = $_POST['caminho'];

    // Montar a consulta SQL de inserção
    $colunas = ['fds', 'urls', 'email', 'senha']; // Substitua pelos nomes reais das suas colunas
    $sql = "LOAD DATA LOCAL INFILE :arquivo
            INTO TABLE $tabela
            FIELDS TERMINATED BY ':'
            LINES TERMINATED BY '\n'
            (" . implode(', ', $colunas) . ")";

    // Obter o número de linhas no arquivo CSV
    $total_linhas = count(file($arquivo_csv));

    // Preparar e executar a consulta SQL
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':arquivo', $arquivo_csv, PDO::PARAM_STR);
    $stmt->execute();

    echo "Dados inseridos com sucesso!";

} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserir arquivoss</title>
</head>
<body>
    <div class="progress mt-3" style="height: 30px;">
        <div id="progresso" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</body>
<script>
    function exibirProgresso() {
        var progresso = document.getElementById('progresso');
        var porcentagem = 0;
        var intervalo = setInterval(function () {
            porcentagem += 1;
            progresso.style.width = porcentagem + '%';
            if (porcentagem >= 100) {
                clearInterval(intervalo);
            }
        }, 100);
    }
</script>
</html>