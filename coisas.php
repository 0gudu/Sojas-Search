<?php 
    require_once "connec.php";
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
    } else {
        $stmt = $pdo->prepare("SELECT * FROM dados WHERE senha LIKE :nome"); 
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
                <th>URL</th>
                <th>Email</th>
                <th>Senha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sites as $c) { ?>
                <tr>
                    <td><?= $c['id_dados']?></td>
                    <td><?= $c['urls']?></td>
                    <td><?= $c['email']?></td>
                    <td><?= $c['senha']?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Include Bootstrap JavaScript and Popper.js (place these before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx" crossorigin="anonymous"></script>
</body>
</html>
                