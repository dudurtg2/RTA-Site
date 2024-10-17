
<?php
if (!isset($_SESSION['access_token'])) {
  return 'Usuário não autenticado'; 
}

$accessToken = $_SESSION['access_token'];

$url = 'http://localhost:30514/bases/findAll';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $accessToken
));
$response = curl_exec($ch);
if (!$response) {
    echo '<div class="alert alert-danger" role="alert">Erro ao buscar as bases!</div>';
} else {
    $bases = json_decode($response, true);
    if (count($bases) > 0) {
      foreach ($bases as $base) {
        echo '<a class="dropdown-item" href="./dashboard.php?r='. htmlspecialchars($base['id']) .'">'. htmlspecialchars($base['nome']) .'</a>';
      }
  } 
}
curl_close($ch);
?>
      