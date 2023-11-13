<?php
if(isset($_POST['confirmar'])) {

    include("conexao.php");
    $id = intval($_GET['id']);
    $sql_code = "DELETE FROM ordem_de_servico WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query) { ?>
        <h1>OS deletado com sucesso!</h1>
        <p><a href="ordemdeservico.php">Clique aqui</a> para voltar para a lista de Ordem de Serviço.</p>
        <?php
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar O.S.</title>
</head>
<body>
    <h1>Tem certeza que deseja deletar esta Ordem de Serviço?</h1>
    
    <form action="" method="post">
        <a style="margin-right:40px;" href="ordemdeservico.php">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>
</body>
</html>