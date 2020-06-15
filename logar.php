<?php
    session_start();
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    
    $nome_servidor = "sql10.freesqldatabase.com";
    $nome_usuario = "sql10346919";
    $senha = "8XrIakDaaq";
    $nome_banco = "sql10346919";

    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

    if ($conecta->connect_error) {
        die("Conexão falhou: " . $conecta->connect_error . "<br>");
    }
    
   $tenta_achar = "SELECT * FROM ususario WHERE nome='$nome' AND email='$email'" ;
    $resultado = $conecta->query($tenta_achar);
    if ($resultado->num_rows > 0) {
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $email;
        header('location:vlw.php');
       
    }
    else{
        session_unset();//remove todas as variáveis de sessão
        session_destroy();//destroi a sessão
        echo "<script> 
                alert('Login ou senha incorreto');
                window.location.href = 'index.html';
            </script>";
      }


    $conecta->close();
    
    
