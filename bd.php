<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $escrita = $_POST['escrita'];
    
    
    $nome_servidor = "sql10.freesqldatabase.com";
    $nome_usuario = "sql10346919";
    $senha = "8XrIakDaaq";
    $nome_banco = "sql10346919";

    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

    if ($conecta->connect_error) {
        die("Conexão falhou: " . $conecta->connect_error . "<br>");
    }

    $sql = "insert into ususario(nome,email,escrita)values('$nome','$email','$escrita')";
    
    if ($conecta->query($sql) === TRUE) {
        header('location:login.html');
  } else {
        echo "Error: " . $sql . "<br>" . $conecta->error;
  } 
    
    $conecta->close();
    