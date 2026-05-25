<?php
   $servidor = "localhost";
   $user = "root";
   $senha = "";
   $dbname = "login";

   //Criar a conexao
   $conn = mysqli_connect($servidor, $user, $senha, $dbname);
   //$id = mysqli_connect($servidor,$user,$senha);

   if(!$conn){
      die("Falha na conexao: " . mysqli_connect_error());
   }
?>
