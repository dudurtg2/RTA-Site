
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Cadastro de Aluno</h4>
              </div>
              <div class="card-body">
              <form class="row g-3" method="post" action="">
                <div class="col-md-12">
                  <label class="form-label">Nome</label>
                  <input type="text" name="nome" required class="form-control" >
                </div>
                <div class="col-md-6">
                  <label class="form-label">Nome da mãe</label>
                  <input type="text" name="nomeMae" required class="form-control" >
                </div>
                <div class="col-md-6">
                  <label class="form-label">Nome do pai</label>
                  <input type="text" name="nomePai" required class="form-control" >
                </div>
                <div class="col-md-6">
                  <label class="form-label">Telefone de contato</label>
                  <input type="text" id="tel_aluno" name="telefone" required class="form-control" >
                </div>
                <div class="col-md-6">
                  <label class="form-label" >CPF</label>
                  <input type="text" name="cpf" id="cpf_aluno" required class="form-control">
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Salvar e Cadastrar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php 
  if(!empty($_POST)){
    $nome = $_POST['nome'];
    $nomeMae = $_POST['nomeMae'];
    $nomePai = $_POST['nomePai'];
    $tel_aluno = $_POST['telefone'];
    $cpf_aluno = $_POST['cpf'];
    $sql = "INSERT INTO alunos (nome, nome_mae, nome_pai, telefone, cpf) VALUES ('$nome', '$nomeMae', '$nomePai', '$tel_aluno', '$cpf_aluno')";
    
  }
?>