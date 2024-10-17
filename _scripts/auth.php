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
function login($username, $password) {
    
    $url = 'http://200.26.254.139:30514/auth/login';

    $loginUrl = $url;

    $data = array(
        'login' => $username,
        'senha' => $password
    );

    $ch = curl_init($loginUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));

    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return false; 
    }

    $result = json_decode($response, true);
    curl_close($ch);

    if (isset($result['token'])) {
        $_SESSION['access_token'] = $result['token'];
        return true; 
    } else {
        return false; 
    }
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        if (login($_POST['username'], $_POST['password'])) {
            ?> 
            <script language='javascript'>
                swal.fire({
                    icon:"success",
                    text:"Login realizado com sucesso!",
                    type:"success"
                }).then((okay)=>{
                    if(okay){
                        window.location.href='/rta-site/pages/dashboard.php';                 
                    }
                });
            </script> 
            <?php 
        } else {
            ?> 
            <script language='javascript'>
                swal.fire({
                    icon:"error",
                    text:"Dados incorretos. Tente novamente :/",
                    type:"error"  
                }).then(okay=>{
                    if(okay){
                        window.location.href='/rta-site/pages/login.php';
                    }
                });
            </script> 
            <?php
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Por favor, preencha todos os campos!</div>';
    }
}
?>
</body>
</html>
