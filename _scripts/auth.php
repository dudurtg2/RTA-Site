<?php
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
 
    if($totalLogin == 1 ){

        if($totalSenha == 1){
            echo '<script alert("Login efetuado com sucesso!");  window.location.href = "/proj3/pages/dashboard.php";</script>';
        }
        else{
            echo '<script alert("Erro, tente novamente.");  window.location.href = "/proj3/pages/login.php";</script>';
        }
    } else {
        echo '<script alert("Erro, tente novamente.");  window.location.href = "/proj3/pages/login.php";</script>';
    }
?>