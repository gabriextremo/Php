<?php 
    $nome = $_POST['nome'];
    $nome_servidor = "sql10.freesqldatabase.com";
    $nome_usuario = "sql10346919";
    $senha = "8XrIakDaaq";
    $nome_banco = "sql10346919";

    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

    if ($conecta->connect_error) {
        die("Conexão falhou: " . $conecta->connect_error . "<br>");
    }
    
    $sql = "DELETE FROM ususario WHERE nome='$nome'";
    if ($conecta->query($sql) === TRUE) {
       echo "<script>alert('Foi bom ter voce com a gente');"
        . "window.location='index.html'</script>";
    } else {
        echo "<script>alert('Deu ruim');"
        . "window.location='deletar.html'</script>";
    }
    $conecta->close();
