<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Lista de regioes</h4>
      </div>
      <div class="card-body">
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
            'Authorization: Bearer ' . $_SESSION['access_token']
        ));

        $response = curl_exec($ch);

        if (!$response) {
          echo '<div class="alert alert-danger" role="alert">Erro ao buscar as regioes!</div>';
        } else {
            $regioes = json_decode($response, true);

            if (count($regioes) > 0) {
              echo '<div class="card-body"> 
                      <div class="row g-3">';
              foreach ($regioes as $regioe) {
              //if($baseSelect == htmlspecialchars($regioe['idBase']['id'])){
                  echo '<form class="row g-3" method="post" action="">
                        <div class="col-md-12">
                          <input type="hidden" name="regiao_id" value="'. htmlspecialchars($regioe['id']) .'">
                          <button type="submit" class="btn btn-primary">'. htmlspecialchars($regioe['id']) .' - '. htmlspecialchars($regioe['nome']) .'</button>
                        </div>
                      </form>';
                  }
              //}
              echo '</div>';
              echo '</div>';
          } else {
              echo '<div class="alert alert-warning" role="alert">Nenhuma cidade encontrada.</div>';
          }
        }
        curl_close($ch);
        ?>
      </div>
    </div>
  </div>
</div>