<?php
    require_once "connec.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procurador de dados</title>
</head>
<body>
    <form action="coisas.php" method="POST">
        <input type="text" name="nomesite">
        <select name="tipopa">
            <option value="1">URL</option>
            <option value="2">EMAIL</option>
            <option value="3">SENHA</option>
        </select>
        <input type="submit" value="obter">
    </form>
    
</body>
</html>