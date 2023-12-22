<?php 
require_once "connec.php";

function limitarTexto($texto, $limite) {
    if (strlen($texto) > $limite) {
        $texto = substr($texto, 0, $limite) . '...';
    }
    return $texto;
}

$input = $_POST['nomesite'];
$type = $_POST['tipopa'];

if ($type == 1){
    $stmt = $pdo->prepare("SELECT * FROM dados WHERE urls LIKE :nome"); 
    $stmt->execute([':nome' => '%' . $input . '%']);
    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else if ($type == 2) {
    $stmt = $pdo->prepare("SELECT * FROM dados WHERE email LIKE :nome"); 
    $stmt->execute([':nome' => '%' . $input . '%']);
    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else if ($type == 3){
    $stmt = $pdo->prepare("SELECT * FROM dados WHERE senha LIKE :nome"); 
    $stmt->execute([':nome' => '%' . $input . '%']);
    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else {
    $stmt = $pdo->prepare("SELECT * FROM dados WHERE id_dados LIKE :nome");
    $stmt->execute([':nome' => '%' . $input . '%']);
    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurador de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container mt-5">
    <h2>Resultados da Busca</h2>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TIPO</th>
                <th>URL</th>
                <th>Email</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sites as $c) { ?>
                <tr>
                    <td><?= $c['id_dados']?></td>
                    <td><?= $c['fds']?></td>
                    <td>
                        <?php
                            $url = limitarTexto($c['urls'], 50);
                            echo $url;
                            if (strlen($c['urls']) > 50) {
                                echo '<button class="btn btn-link" onclick="toggleText(\'urls-' . $c['id_dados'] . '\')">Ver Mais</button>';
                            }
                        ?>
                    </td>
                    <td><?= limitarTexto($c['email'], 50)?></td>
                    <td><?= limitarTexto($c['senha'], 50)?></td>
                </tr>
                <?php if (strlen($c['urls']) > 50) { ?>
                    <tr id="urls-<?= $c['id_dados'] ?>" style="display: none;">
                        <td></td>
                        <td></td>
                        <td><?= $c['urls'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <!-- Include Bootstrap JavaScript and Popper.js (place these before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx" crossorigin="anonymous"></script>

    <script>
        // Função para expandir/contrair texto
        function toggleText(elementId) {
            var element = document.getElementById(elementId);
            if (element.style.display === 'none') {
                element.style.display = 'table-row';
            } else {
                element.style.display = 'none';
            }
        }
    </script>
</body>
</html>
