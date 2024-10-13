
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Cadastro de Cidade</h4>
      </div>
      <div class="card-body">
        <form class="row g-3" method="post" action="../_scripts/banco/registroCidade.php">
          <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" required class="form-control">
          </div>
          <div class="col-md-4">
            <label class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" required class="form-control">
          </div>
          <div class="col-md-2">
            <label class="form-label">Id</label>
            <input type="number" name="idRegiao" required class="form-control">
          </div>
          
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar e Cadastrar</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  
</div>
<?php include 'tabelas/cidades.php'?>
