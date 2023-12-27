<?php 
    require_once "src/includes/connec.php";
    $stmt = $pdo->prepare("SELECT * FROM databasess");
    $stmt->execute();
    $nomes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arthuro buscas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <style>
        .databaseDiv {
            display: none;
        }

        .conteiner {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-dark">
        <a class="navbar-brand text-white m-2" href="#"><h5>arthuro enterprises</h5></a>
        <span><button type="button" class="btn btn-primary" onclick="exibircoisa()">
                Ver databases inseridas
            </button>
            <a href="src/php/caminhos.php" class="btn btn-secondary me-5" role="button">Inserir data (xampp)</a></span>

    </nav>
    <div class="conteiner mt-5">
        <p class="display-1">SOJAS SEARCH</p>
    </div>
    <div class="container mt-5">
        <form action="src/php/coisas.php" method="GET" class="mb-3">
            <input type="hidden" name="qnts" id="qnts" value="50">
            <div class="row align-items-end">
                <div class="col-md-9">
                    <label for="nomesite" class="form-label">Nome do dado</label>
                    <input type="text" name="nomesite" class="form-control" id="nomesite" required>
                </div>
                <div class="col-md-2">
                    <label for="tipopa" class="form-label">Tipo de Dado</label>
                    <select name="tipopa" class="form-select" id="tipopa">
                        <option value="1">URL</option>
                        <option value="2">EMAIL</option>
                        <option value="3">SENHA</option>
                        <option value="4">ID</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="databaseDiv">
        <div class="container mt-5">
            <p class="h3">Databases inseridas:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($nomes as $c) { ?>
                        <tr>
                            <td><?= $c['id_database']; ?></td>
                            <td><?= $c['names']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript and Popper.js (place these before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx"
        crossorigin="anonymous"></script>
    <!-- Inclua a biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function exibircoisa() {
            $(".databaseDiv").toggle();
        }
    </script>
</body>

</html>
