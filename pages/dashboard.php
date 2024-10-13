
<!DOCTYPE html>
<html lang="pt_br">
<?php include 'head.php'?>

<body class="">
  <div class="wrapper ">
    <?php include 'menu.php'?>
    <div class="main-panel">
      <?php include 'header.php'?>
      <div class="content">
        <?php include 'cards.php'?>
        <?php
            switch ($_GET['r']) {
              case 'cadAluno':
                include 'template/cadAluno.php';
                break;
              case 'cadFuncionario':
                include 'template/cadFuncionario.php';
                break;
              case 'cadCidade':
                include 'template/cadCidade.php';
                break;
            }
          ?>
      </div>
      <?php include 'footer.php'?>
    </div>
  </div>
  <?php include 'js.php'?>
</body>
</html>
