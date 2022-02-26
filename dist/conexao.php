<?php
session_start(); 
    //Incluindo a conexão com banco de dados   
include_once("conexao.php");    
//O campo usuário e senha preenchido entra no if para validar
if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha = md5($senha);
        
    //Buscar na tabela usuarios o usuário que corresponde com os dados digitado no formulário
    $sql = "SELECT usuario, senha, tipo_conta FROM usuarios";
    $resultado = mysqli_query($conn, $sql);
    
    //Encontrado um usuario na tabela usuarios com os mesmos dados digitado no formulário
    if (mysqli_num_rows($result) > 0)
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo_conta'] = $tipo_conta;
        if($_SESSION['tipo_conta'] == "0"){
            header("Location: consulente.php");
        }elseif($_SESSION['tipo_conta'] == "1"){
            header("Location: prestador.php");
        }else{ 
            //Não foi encontrado um usuario na tabela usuarios com os mesmos dados digitado no formulário
            //redireciona o usuario para a página de login
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: index.php");
    }
//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
}else{
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: index.php");
}
?>
