<?php 
require_once "../includes/connec.php";

function limitarTexto($texto, $limite) {
    if (strlen($texto) > $limite) {
        $texto = substr($texto, 0, $limite) . '...';
    }
    return $texto;
}

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;


$quantidade = intval($_GET['qnts']);

$climit = ($quantidade * $pagina) - $quantidade;
$ultimoid = $_GET['ultimoid'];
$input = $_GET['nomesite'];
$type = $_GET['tipopa'];

//arrumar pq nn volta a func
$funcnova = isset($_GET['beta']) && $_GET['beta'] === 'on' ? 'on' : 'off';
if ($funcnova == "off"){
    if ($type == 1){
        $stmt = $pdo->prepare('SELECT * FROM dados WHERE urls LIKE :nome LIMIT :climit, :quantidade');
        $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':climit', $climit, PDO::PARAM_INT);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->execute();
    
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if ($type == 2) {
        $stmt = $pdo->prepare("SELECT * FROM dados WHERE email LIKE :nome LIMIT :climit, quantidade"); 
        $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':climit', $climit, PDO::PARAM_INT);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if ($type == 3){
        $stmt = $pdo->prepare("SELECT * FROM dados WHERE senha LIKE :nome LIMIT :climit, quantidade"); 
        $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':climit', $climit, PDO::PARAM_INT);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        $stmt = $pdo->prepare("SELECT * FROM dados WHERE id_dados LIKE :nome LIMIT :climit, quantidade");
        $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':climit', $climit, PDO::PARAM_INT);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}else {
    $numcontent = 0;
    if ($type == 1){
        $stmt = $pdo->prepare('SELECT * FROM dados WHERE id_dados > :ultimoid AND urls LIKE :input LIMIT :quantidade');
        $stmt->bindValue(':ultimoid', $ultimoid, PDO::PARAM_INT);
        $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->execute();
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if ($type == 2) {
        $stmt = $pdo->prepare('SELECT * FROM dados WHERE id_dados > :ultimoid AND email LIKE :input LIMIT :quantidade');
        $stmt->bindValue(':ultimoid', $ultimoid, PDO::PARAM_INT);
        $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->execute();
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if ($type == 3){
        $stmt = $pdo->prepare('SELECT * FROM dados WHERE id_dados > :ultimoid AND senha LIKE :input LIMIT :quantidade');
        $stmt->bindValue(':ultimoid', $ultimoid, PDO::PARAM_INT);
        $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->execute();
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        $stmt = $pdo->prepare('SELECT * FROM dados WHERE id_dados > :ultimoid AND id_dados LIKE :input LIMIT :quantidade');
        $stmt->bindValue(':ultimoid', $ultimoid, PDO::PARAM_INT);
        $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
        $stmt->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->execute();
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


/*
*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procurador de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-dark">
        <a class="navbar-brand text-white m-2" href="../../index.php"><h5>arthuro enterprises</h5></a>
        <a href="../../index.php" class="btn btn-secondary me-5" role="button"><-Voltar</a>
    </nav>
    <div class="container mt-5">
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
            <?php foreach($sites as $c) { 
                
                if ($funcnova == "on"){
                    $numcontent ++;
                }?>
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
            <?php } if ($numcontent !=0){$ultimoid = $c['id_dados'];}?>
        </tbody>
    </table>
    
    
    
    <?php
        if ($funcnova == "off"){
            if ($type == 1){
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM dados WHERE urls LIKE :nome");
                $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
                $stmt->execute();
                $quant = $stmt->fetchColumn();
            } else if ($type == 2) {
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM dados WHERE email LIKE :nome");
                $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
                $stmt->execute();
                $quant = $stmt->fetchColumn();
            } else if ($type == 3){
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM dados WHERE senha LIKE :nome");
                $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
                $stmt->execute();
                $quant = $stmt->fetchColumn();
            }else {
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM dados WHERE id_dados LIKE :nome");
                $stmt->bindValue(':nome', '%' . $input . '%', PDO::PARAM_STR);
                $stmt->execute();
                $quant = $stmt->fetchColumn();
            }
            
            echo "Total de resultados: " . $quant;
            $npagina = ceil($quant / $quantidade);
        }
        
        ?>

        <nav aria-label="Page_navigation">
        <ul class="pagination">
            
            
        
        <?php
        if ($funcnova == "off") {
            if ($pagina != 1){
                $prevpage = $pagina - 1;
                echo "<li class='page-item'><a class='page-link' href='?nomesite=$input&tipopa=$type&pagina=$prevpage&qnts=$quantidade&ultimoid=$ultimoid&beta=$funcnova'>Anterior</a></li>";
            }
            
            for ($n = 1; $n <= $npagina; $n++) {
                if($n>=($pagina-5)&& $n <= ($pagina+5)){
                    if ($n == $pagina) {
                        echo "<li class='page-item active'><span class='page-link'>$n</span></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?nomesite=$input&tipopa=$type&pagina=$n&qnts=$quantidade&ultimoid=$ultimoid&beta=$funcnova'>$n</a></li>";
                    }
                }
                
            }
            
    
            if ($pagina != $npagina){
                $nextpage = $pagina + 1;
                echo "<li class='page-item'><a class='page-link' href='?nomesite=$input&tipopa=$type&pagina=$nextpage&qnts=$quantidade&ultimoid=$ultimoid&beta=$funcnova'>Proxima</a></li>";
            }
        }else{
            if ($numcontent == $quantidade){
                $proxpage = "on";
            }else {
                $proxpage = "off";
            }
            if ($pagina == 1) {
                echo "<li class='page-item active'><span class='page-link'>1</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?nomesite=$input&tipopa=$type&pagina=1&qnts=$quantidade&ultimoid=0&beta=$funcnova'>Voltar ao inicio</a></li>";
            }
            if ($proxpage == "on"){
                $nextpage = $pagina + 1;
                if ($pagina !=1){
                    echo "<li class='page-item active'><a class='page-link' href='?nomesite=$input&tipopa=$type&pagina=$nextpage&qnts=$quantidade&ultimoid=$ultimoid&beta=$funcnova'>Proxima</a></li>";
                }else {
                    echo "<li class='page-item'><a class='page-link' href='?nomesite=$input&tipopa=$type&pagina=$nextpage&qnts=$quantidade&ultimoid=$ultimoid&beta=$funcnova'>Proxima</a></li>";
                }
            }else {
                echo "<li class='page-item active'><a class='page-link'>Ultima Pagina</a></li>";
            }
        }
        

    ?>
    </ul>
    <div class="col-md-6">

      <div class="form-group">
        <label for="qnts">Alterar quantidade por Página:</label>
        <div class="input-group">
          <input type="number" class="form-control form-control-sm" id="qnts" name="qnts" value="<?=$quantidade?>">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="mudarqntpagina()">Alterar</button>
          </div>
        </div>
      </div>
    </div>
        </nav>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyEOU8bHs3t9T5O8xWIrUZhQK1OeANth9y" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8a+tpfWTZI6qPPTfiu6Ij0d8f6GltTUQd2I8Njds3+q0F2FflJ66cuutL3tx" crossorigin="anonymous"></script>
    <script src="../js/jquery.js"></script>
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
        function mudarqntpagina() {
                var qntsValue = $('#qnts').val();

                var novaURL = "?nomesite=" + encodeURIComponent("<?=$_GET['nomesite']?>") +
                        "&tipopa=" + encodeURIComponent("<?=$_GET['tipopa']?>") +
                        "&pagina=" + encodeURIComponent(1) +
                        "&qnts=" + encodeURIComponent(qntsValue) +  
                        "&ultimoid=" + encodeURIComponent(0) +
                        "&beta=" + encodeURIComponent("<?php echo $funcnova; ?>");
                window.location.href = novaURL;

        }

    </script>
</body>
</html>
