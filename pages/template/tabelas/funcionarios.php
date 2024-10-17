<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Lista de Funcionários</h4>
      </div>
      <div class="card-body">
        <?php
        
        if (!isset($_SESSION['access_token'])) {
            return 'Usuário não autenticado'; 
        }
        
        $accessToken = $_SESSION['access_token'];

        $url = 'http://200.26.254.139:30514/funcionarios/findAll';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ));

        $response = curl_exec($ch);

        if (!$response) {
            echo '<div class="alert alert-danger" role="alert">Erro ao buscar os funcionários!</div>';
        } else {
            $funcionarios = json_decode($response, true);

            if (count($funcionarios) > 0) {
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Nome</th><th>Email</th><th>Telefone</th><th>CPF</th></tr></thead>';
                echo '<tbody>';
                
                foreach ($funcionarios as $funcionario) {
                    
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($funcionario['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($funcionario['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($funcionario['telefone']) . '</td>';
                    echo '<td>' . htmlspecialchars($funcionario['cpf']) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<div class="alert alert-warning" role="alert">Nenhum funcionário encontrado.</div>';
            }
        }

        curl_close($ch);
        ?>
      </div>
    </div>
  </div>
</div>