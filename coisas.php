<?php 
    require_once "connec.php";
    $input = $_POST['nomesite'];
    $type = $_POST['tipopa'];

    if ($type == 1){
        $stmt = $pdo->prepare("SELECT * FROM dados WHERE urls LIKE :nome"); 
        $stmt->execute([':nome' => '%' . $input . '%']);
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else if ($type == 2) {
        $stmt = $pdo->prepare("SELECT * FROM dados WHERE email LIKE :nome"); 
        $stmt->execute([':nome' => '%' . $input . '%']);
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    tabelas com tudo ae mn
    <hr>
    <table class="table">
        <?php foreach($sites as $c) { ?>
            <tr>
                <td>id: <?= $c['id_dados']?> </td>
                <td>url: <?= $c['urls']?> </td>
                <td>email: <?= $c['email']?> </td>
                <td>senha: <?= $c['senha']?> </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
