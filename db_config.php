<?php

  $dsn = 'mysql:host=example1.c29s7hgigoky.us-west-2.rds.amazonaws.com;dbname=aws_seiu775App;port=3306';
  $username = 'example1';
  $password = 'example1';
  $options = array(
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                   );
  
  try {
    $dbh = new PDO($dsn, $username, $password);
    //echo "Connected";
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    
  }
  
?>