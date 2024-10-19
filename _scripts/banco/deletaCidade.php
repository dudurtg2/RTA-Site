<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
print_r($_GET['id']);
if (!isset($_SESSION['access_token'])) {
    echo 'Usuário não autenticado';
    exit;
}
$accessToken = $_SESSION['access_token'];

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo 'ID não fornecido';
    exit;
}

$url = 'http://localhost:30514/cidades/deleteById/' . intval($_GET['id']);
print_r($url);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $accessToken
));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

print_r($httpCode);

if ($httpCode == 200) {
    ?>
    <script>
        Swal.fire({
            icon: "success",
            text: "Região excluída com sucesso!",
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
    <script>
        Swal.fire({
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
?>
</body>
</html>
