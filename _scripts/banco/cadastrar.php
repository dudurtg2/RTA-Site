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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = array(
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => md5($_POST['senha']),
        'telefone' => $_POST['telefone'],
        'cpf' => $_POST['cpf']
    );

    $jsonData = json_encode($data);

    $apiUrl = ENV_KEY();
    
    $url = $apiUrl . '/funcionarios/save';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode == 201) { 
      ?>
      <script language='javascript'>
          swal.fire({
              icon: "success",
              text: "Funcionário cadastrado com sucesso!",
              type: "success"
          }).then((okay) => {
              if (okay) {
                  window.location.href = '../../pages/dashboard.php?r=cadFuncionario';                 
              }
          });
      </script>
<?php 
    } else { 
      ?>
      <script language='javascript'>
          swal.fire({
              icon: "error",
              text: "Dados incorretos. Tente novamente :/",
              type: "error"
          }).then((okay) => {
              if (okay) {
                  window.location.href = '../../pages/dashboard.php?r=cadFuncionario';
              }
          });
      </script>
<?php 
    } 
} else { ?>
  <script language='javascript'>
      swal.fire({
          icon: "error",
          text: "Método de requisição inválido.",
          type: "error"
      }).then(okay => {
          if (okay) {
              window.location.href = '../../pages/dashboard.php?r=cadFuncionario';
          }
      });
  </script>
<?php 
}
?>
</body>
</html>
