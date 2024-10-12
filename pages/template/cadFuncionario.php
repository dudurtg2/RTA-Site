
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Cadastro de Funcionario</h4>
      </div>
      <div class="card-body">
        <form class="row g-3" method="post" action="../_scripts/banco/cadastrar.php">
          <div class="col-md-12">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" required class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" required class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" required class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefone de contato</label>
            <input type="text" name="telefone"  id="telefone_funcionario" required class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf_funcionario" required class="form-control">
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar e Cadastrar</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  
</div>
<?php include 'tabelas/funcionarios.php'?>

