<?php
if(isset($_POST['confirmar'])) {

    include("conexao.php");
    $id = intval($_GET['id']);
    $sql_code = "DELETE FROM ordem_de_servico WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query) {
        $message = "<div class='message'><h1>O.S. deletado com sucesso!</h1><p><a href='clientes.php'>Clique aqui</a> para voltar para a lista de Clientes.</p></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar OS</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-deletar-os.css">
    <style>
      
        .message {
            text-align: center;
            margin-top: 20px;
        }

        .confirm-dialog {
            display: none;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 18px;
        }
    </style>
</head>
<body>
<header>
        <h1>DELETAR OS</h1>
    </header>
    <div class="content">
       
        <ul>
            <li><a href="clientes.php">Listar Clientes</a></li> 
            <li><a href="cadastrar_cliente.php">Cadastrar Cliente</a></li>
            <li><a href="cadastrar_os.php">Cadastrar O.S.</a></li>
            <li><a href="ordemdeservico.php">Exibir O.S.</a></li>
        </ul>
        <h2 style="text-align: center;">Tem certeza que deseja deletar essa OS?</h2>
        <form action="" method="post" id="deleteForm">
            <button type="button" onclick="cancelDelete()">Não</button>
            <button type="button" onclick="confirmDelete()">Sim</button>
        </form>
    </div>

    <div class="confirm-dialog" id="confirmDialog">
        <p>Essa ação irá excluir permanentemente o registro da OS. Você deseja realmente continuar?</p>
        <button onclick="submitForm()">Confirmar</button>
        <button onclick="cancelDialog()">Cancelar</button>
    </div>

    <?php
    if(isset($message)) {
        echo $message;
    }
    ?>
 
 <script>
        function confirmDelete() {
            document.getElementById('confirmDialog').style.display = 'block';
        }

        function cancelDelete() {
            window.location.href = 'clientes.php';
        }

        function submitForm() {
            document.getElementById('deleteForm').submit();
        }

        function cancelDialog() {
            document.getElementById('confirmDialog').style.display = 'none';
        }
    </script>
 
    
</body>
</html>
