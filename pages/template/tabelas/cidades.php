<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Lista de cidades</h4>
      </div>
      <div class="card-body">
        <?php
        if (!isset($_SESSION['access_token'])) {
          return 'Usuário não autenticado'; 
        }

        $accessToken = $_SESSION['access_token'];

        $url = 'http://localhost:30514/cidades/findAll';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ));

        $response = curl_exec($ch);

        if (!$response) {
          echo '<div class="alert alert-danger" role="alert">Erro ao buscar as cidades!</div>';
        } else {
            $cidades = json_decode($response, true);
            $count = 0;
            if (count($cidades) > 0 && isset($cidades)) {
              echo '<div class="row g-3">';
              foreach ($cidades as $cidade) {
                if ($regiaoSelect == htmlspecialchars($cidade['idRegiao']['id'])) {
                  $count++;
                  echo '<div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                      <div class="card-body">
                        <div class="row">                 
                          <div class="col-7 col-md-8">
                            <div class="testes">
                              <p class="card-test">' . htmlspecialchars($cidade['nome']) . '<p>
                              <p class="card-category">' . htmlspecialchars($cidade['cep']) . '</p>
                              </div>
                              
                              <i class="fa-solid fa-pen-to-square btn btn-primary"></i>
                              <a href="../_scripts/banco/deletaCidade.php?id=' . htmlspecialchars($cidade['id']) . '">
                                <i class="fa-solid fa-trash btn btn-danger"></i> 
                              </a>
                              
                          </div>
                        </div>
                      </div>
                      <div class="card-footer ">
                        <hr>
                        <div class="stats">
                          
                          ' . htmlspecialchars($cidade['idRegiao']['nome']) . '  
                          
                        
                        </div>
                      </div>
                    </div>
                  </div>';
                } 
              } 
              
              echo '</div>';
              if ($count == 0) {
                echo '<div class="alert alert-warning" role="alert">Nenhuma cidade encontrado.</div>';
              }
            } else {
                echo '<div class="alert alert-warning" role="alert">Nenhuma cidade encontrado.</div>';
            }
        }
        curl_close($ch);
        ?>
      </div>
    </div>
  </div>
</div>