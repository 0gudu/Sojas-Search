<?php
    require_once("../../config/configdb.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração do Banco de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="alert alert-danger text-center" role="alert">
                                Ocorreu um erro na conexão do banco de dados. Por favor, verifique as informações inseridas.
                              </div>
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Configuração do Banco de Dados</h3>
                    </div>
                    <div class="card-body">
                        <form action="scripts/newconfig.php" method="POST">
                            <div class="mb-3">
                                <label for="dbname" class="form-label">Nome do Banco de dados</label>
                                <input type="text" class="form-control" name="dbname" required>
                            </div>
                            <div class="mb-3">
                                <label for="host" class="form-label">Host do Banco de dados</label>
                                <input type="text" class="form-control" name="host" required>
                            </div>
                            <div class="mb-3">
                                <label for="user" class="form-label">Usuário do Banco de dados</label>
                                <input type="text" class="form-control" name="user" >
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha do Banco de dados</label>
                                <input type="password" class="form-control" name="senha" >
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx" crossorigin="anonymous"></script>
</body>
</html>
