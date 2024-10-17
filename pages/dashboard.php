
<?php 
  include 'head.php';

  $regiaoSelect = 1;
  

  global $regiaoSelect;
?>

<body class="">
  <div class="wrapper ">
    <?php include 'menu.php'?>
    <div class="main-panel">
      <?php include 'header.php'?>
      <div class="content">
        <?php include 'cards.php';?>
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
              case 'cadProf':
                include 'template/cadProf.php';
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
