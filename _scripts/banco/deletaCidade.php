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
    if (!isset($_SESSION['access_token'])) {
        return 'Usuário não autenticado'; 
    }

    $accessToken = $_SESSION['access_token'];

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            return 'ID não fornecido';
        }
    
        $url = 'http://localhost:30514/cidades/deleteById/' . intval($_GET['id']);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ));
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

    if ($httpCode == 200) {
      ?>
      <script language='javascript'>
          swal.fire({
              icon: "success",
              text: "Região cadastrado com sucesso!",
              type: "success"
          }).then((okay) => {
              if (okay) {
                  window.location.href = '../../pages/dashboard.php?r=cadCidade';                 
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
                  window.location.href = '../../pages/dashboard.php?r=cadCidade';
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
              window.location.href = '../../pages/dashboard.php?r=cadCidade';
          }
      });
  </script>
<?php 
}
?>
</body>
</html>
