<?php

$nome_arquivo = 'dados.txt';
$total_linhas = 9999999;

$arquivo = fopen($nome_arquivo, 'w');

for ($i = 1; $i <= $total_linhas; $i++) {
    $linha = generateRandomString(100) . ':' . generateRandomString(100) . ':' . generateRandomString(100) . ':' . generateRandomString(100) . "\n";
    fwrite($arquivo, $linha);
}

fclose($arquivo);

echo "Arquivo gerado com sucesso: $nome_arquivo";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
?>