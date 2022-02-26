<?php
$servidor = "localhost:8181";
$usuario = "root";
$senha = "sliver";
$dbname = "root";    
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn){
 die("Falha na conexao: " . mysqli_connect_error());
 }else{
 echo "Conexao realizada com sucesso";
 }      
 ?>
