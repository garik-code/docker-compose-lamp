<?php

  include './lib/Database.class.php'; // Класс для работы с базой данных

  $db = new Database();
  $products = $db->fetchAll('SELECT * FROM products');
  print json_encode($products);

?>
