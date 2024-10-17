<?php
session_start(); // Inicia a sessão ou recupera a sessão existente

function qtdeFuncionarios() {
    if (!isset($_SESSION['access_token'])) {
        return 'Usuário não autenticado'; 
    }

    $accessToken = $_SESSION['access_token'];
    
    $url = 'http://200.26.254.139:30514/funcionarios/findAll';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $accessToken 
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        return count(json_decode($response, true));
    } else {
        return 0; 
    }
}


?>