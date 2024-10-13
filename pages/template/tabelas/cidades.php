<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Lista de cidades</h4>
      </div>
      <div class="card-body">
        <?php
        $apiUrl = ENV_KEY();
        
        $url = $apiUrl . '/cidades/findAll';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        $response = curl_exec($ch);

        if (!$response) {
            echo '<div class="alert alert-danger" role="alert">Erro ao buscar as cidades!</div>';
        } else {
            $cidades = json_decode($response, true);

            if (count($cidades) > 0) {
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Região</th><th>Nome</th><th>CEp</th></tr></thead>';
                echo '<tbody>';
                
                foreach ($cidades as $cidade) {
                  
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($cidade['idRegiao']['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($cidade['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($cidade['cep']) . '</td>';
                    echo '</tr>';
                    
                }

                echo '</tbody>';
                echo '</table>';
                
                
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