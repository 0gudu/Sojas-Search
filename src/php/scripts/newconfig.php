<?php
    $dbname = $_POST['dbname'];
    $host = $_POST['host'];
    $dbuser = $_POST['user']; 
    $dbpass = $_POST['senha'];

    $novaconfig = "<?php
        \$dbname = '$dbname';
        \$host = '$host';
        \$dbuser = '$dbuser'; 
        \$dbpass = '$dbpass'; 
    ?>";
    $caminho = '../../../config/configdb.php';
    file_put_contents($caminho, $novaconfig);
    header("Location: ../../../index.php");
?>
