<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['access_token'])) {
        echo "<script>
                swal.fire({
                    icon: 'error',
                    text: 'Usuário não autenticado.',
                    type: 'error'
                }).then(okay => {
                    if (okay) {
                        window.location.href = '../../pages/dashboard.php?r=cadFuncionario';
                    }
                });
              </script>";
        exit;
    }

    $accessToken = $_SESSION['access_token'];

   
    $data = array(
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'cpf' => $_POST['cpf'],
        'idBase' => array('id' => $_POST['base'])
    );

    
    $Rdata = array(
        'login' => $_POST['email'],
        'senha' => $_POST['senha']
    );

    $RjsonData = json_encode($Rdata);
    $Rurl = 'http://localhost:30514/auth/register';

    
    $Rch = curl_init($Rurl);
    curl_setopt($Rch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($Rch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($RjsonData),
    ));
    curl_setopt($Rch, CURLOPT_POST, true);
    curl_setopt($Rch, CURLOPT_POSTFIELDS, $RjsonData);

    $jsonData = json_encode($data);
    $url = 'http://localhost:30514/funcionarios/save';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData),
        'Authorization: Bearer ' . $accessToken
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 201) { 
        echo "<script>
                swal.fire({
                    icon: 'success',
                    text: 'Funcionário cadastrado com sucesso!',
                    type: 'success'
                }).then(okay => {
                    if (okay) {
                        window.location.href = '../../pages/dashboard.php?r=cadFuncionario';                 
                    }
                });
              </script>";
    } else { 
        echo "<script>
                swal.fire({
                    icon: 'error',
                    text: 'Dados incorretos. Tente novamente :/',
                    type: 'error'
                }).then(okay => {
                    if (okay) {
                        window.location.href = '../../pages/dashboard.php?r=cadFuncionario';
                    }
                });
              </script>";
    } 
} else { 
    echo "<script>
            swal.fire({
                icon: 'error',
                text: 'Método de requisição inválido.',
                type: 'error'
            }).then(okay => {
                if (okay) {
                    window.location.href = '../../pages/dashboard.php?r=cadFuncionario';
                }
            });
          </script>";
}
?>

</body>
</html>
