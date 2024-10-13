<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
<?php

if (isset($_POST['username']) && isset($_POST['password'])) {

    $apiUrl = ENV_KEY();
    
    $url = $apiUrl . '/funcionarios/findByEmail/' . $_POST['username'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);

    if (!$response) {
        echo '<div class="alert alert-danger" role="alert">Erro ao conectar ao servidor!</div>';
    } else {
        $auth = json_decode($response, true);
        $password = md5($_POST['password']);

        if (isset($auth['senha']) && $auth['senha'] == $password) {
            ?> <script language='javascript'>
                swal.fire({
                    icon:"success",
                    text:"Login realizado com sucesso!",
                    type:"success"
                }).then((okay)=>{
                    if(okay){
                        window.location.href='/rta-site/pages/dashboard.php';                 
                    }
                });
            </script> <?php 
        } else {
            ?> <script language='javascript'>
                swal.fire({
                    icon:"error",
                    text:"Dados incorretos. Tente novamente :/",
                    type:"success"
                }).then(okay=>{
                    if(okay){
                        window.location.href='/rta-site/pages/login.php';

                    }
                });
            </script> <?php
        }
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Por favor, preencha todos os campos!</div>';
}
?>
