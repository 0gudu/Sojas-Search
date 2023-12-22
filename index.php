<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurador de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container mt-5">

    <form action="coisas.php" method="POST" class="mb-3">
        <div class="mb-3">
            <label for="nomesite" class="form-label">Nome do dado</label>
            <input type="text" name="nomesite" class="form-control" id="nomesite">
        </div>
        <div class="mb-3">
            <label for="tipopa" class="form-label">Tipo de Dado</label>
            <select name="tipopa" class="form-select" id="tipopa">
                <option value="1">URL</option>
                <option value="2">EMAIL</option>
                <option value="3">SENHA</option>
                <option value="4">ID</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Obter</button>
    </form>

    <!-- Include Bootstrap JavaScript and Popper.js (place these before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx" crossorigin="anonymous"></script>
</body>
</html>
