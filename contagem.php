<html>
 <head>
  <title>Passar Variável PHP para Javascript</title>
 </head>
 <body>
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
            $destro=$linha["escritaD"];
        }
        while($linha2 =$resultado2->fetch_assoc()){
            $canhoto=$linha2["escritaC"];
        }
    } else {
        echo "0 results";
    }
    echo $destro."|".$canhoto;
     $conecta->close();
     ?>
     <script type="text/javascript">
   var mensagem = "<?php echo "Voce e mais ".$canhoto. " pessoa(s) escrevem com a mesma mão";?>";
   alert(mensagem);
  </script>
</body>
</html>