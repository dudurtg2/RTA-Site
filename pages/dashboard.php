
<!DOCTYPE html>
<html lang="pt_br">
<?php 
  include 'head.php';
  require '../vendor/autoload.php';

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
  $dotenv->load();
        
  $apiUrl = $_ENV['API_URL'];
  function ENV_KEY() {
    global $apiUrl;
    return $apiUrl;
  }

  $regiaoSelect = 1;
  $baseSelect;

  global $baseSelect;
  global $regiaoSelect;
?>

<body class="">
  <div class="wrapper ">
    <?php include 'menu.php'?>
    <div class="main-panel">
      <?php include 'header.php'?>
      <div class="content">
        
        <?php
        if (isset($_GET['r'])) {
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
              default:
                $baseSelect = $_GET['r'];
                print_r($baseSelect);
                
            }
        }
          ?>
      </div>
      <?php include 'footer.php'?>
    </div>
  </div>
  <?php include 'js.php'?>
</body>
</html>
