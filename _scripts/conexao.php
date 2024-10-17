<?php 
  require '../vendor/autoload.php';

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
  $dotenv->load();
        
  $apiUrl = $_ENV['API_URL'];
  function ENV_KEY() {
    global $apiUrl;
    return $apiUrl;
  }

  
?>