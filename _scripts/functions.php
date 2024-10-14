<?php

function qtdeFuncionarios(){
    $apiUrl = ENV_KEY();
    $url = $apiUrl . '/funcionarios/findAll';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    $response = curl_exec($ch);
    if ($response) {
        return count(json_decode($response, true));
    }
}
?>