<?php
    $nome_servidor = "sql10.freesqldatabase.com";
    $nome_usuario = "sql10346919";
    $senha = "8XrIakDaaq";
    $nome_banco = "sql10346919";

    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

    if ($conecta->connect_error) {
        die("Conexão falhou: " . $conecta->connect_error . "<br>");
    }
    
    $sql = "select count(escrita) as escritaD from ususario where escrita='D'";
    $sql2 = "select count(escrita) as escritaC from ususario where escrita='C'";
    
    $resultado = $conecta->query($sql);
    $resultado2 =$conecta->query($sql2); 
    
    if ($resultado->num_rows > 0 || $resultado2->num_rows>0) {
    // saída dos dados
    while($linha = $resultado->fetch_assoc()) {
        $x=$linha["escritaD"];
    }
    while($linha2 =$resultado2->fetch_assoc()){
        $y=$linha2["escritaC"];
    }
    } else {
    echo "0 results";
    }
    echo $x."|".$y;
     $conecta->close();
