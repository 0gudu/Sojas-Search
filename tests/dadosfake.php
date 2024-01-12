<?php

$nome_arquivo = 'dados.txt';


$total_linhas = 999000;


$arquivo = fopen($nome_arquivo, 'w');


for ($i = 1; $i <= $total_linhas; $i++) {
    $linha = "$i:$i:$i:$i\n";
    fwrite($arquivo, $linha);
}


fclose($arquivo);

echo "Arquivo gerado com sucesso: $nome_arquivo";
?>
