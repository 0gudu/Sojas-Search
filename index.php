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
        <input type="submit" value="obter">
    </form>
    
</body>
</html>