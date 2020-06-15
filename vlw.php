<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
                <style>
            img {
              display: block;
              margin-left: auto;
              margin-right: auto;
            }
</style>
    </head>
    <body style="background-color:lightgray">
        <?php 
        session_start();//Inicia uma nova sessão ou resume uma sessão existente



        if((!isset ($_SESSION['nome']) == true) and (!isset ($_SESSION['email']) == true))
        {
            session_unset();//remove todas as variáveis de sessão
            echo "<script>
                alert('Esta página só pode ser acessada por usuário logado');
                window.location.href = 'login.html';
                </script>";

        }
        
        $logado = $_SESSION['nome'];

        $nome_servidor = "sql10.freesqldatabase.com";
        $nome_usuario = "sql10346919";
        $senha = "8XrIakDaaq";
        $nome_banco = "sql10346919";

        $conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);

        if ($conecta->connect_error) {
            die("Conexão falhou: " . $conecta->connect_error . "<br>");
        }

        $sql = "select count(escrita) as escritaD from ususario where nome='$logado'";

        $resultado = $conecta->query($sql);


        if ($resultado->num_rows > 0 || $resultado2->num_rows>0) {
        // saída dos dados
            while($linha = $resultado->fetch_assoc()) {
                $destro=$linha["escritaD"];
            }
        } else {
            echo "0 results";
        }
         $conecta->close();
         ?>
         <script type="text/javascript">
       var mensagem = "<?php echo "Voce e mais ".$destro. " pessoa(s) escrevem com a mesma mão";?>";
       alert(mensagem);
      </script>
        <h1 align="center">Obrigado por nos ajudar</h1>
        <img src="gato.gif" style="width: 50%;">
        <h1 align="center">Estamos trabalhando para fazer mais funcionalidade para o site</h1>
    </body>
</html>
