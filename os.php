<?php
// Variável para armazenar a mensagem de retorno
$message = "";

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexao.php'); // Inclua a conexão aqui, dentro do escopo onde é necessário

    // Capturar os dados do formulário
    $id = intval($_POST["id"]);
    $nome_os = $_POST["nome_os"];
    $servico = $_POST["servico"];
    $materiais = $_POST["materiais"];
    $mao_de_obra = $_POST["mao_de_obra"];
    $orcamento_total = $_POST["orcamento_total"];

    // Construa a consulta SQL para inserir ou atualizar os dados no banco de dados
    $sql = "INSERT INTO ordem_de_servico (id, nome_os, servico, materiais, mao_de_obra, orcamento_total) 
            VALUES ('$id', '$nome_os', '$servico', '$materiais', '$mao_de_obra', '$orcamento_total')
            ON DUPLICATE KEY UPDATE nome_os = '$nome_os', servico = '$servico', materiais = '$materiais', mao_de_obra = '$mao_de_obra', orcamento_total = '$orcamento_total'";

    // Execute a consulta SQL e verifique se a inserção/atualização foi bem-sucedida
    if ($mysqli->query($sql) === TRUE) { // Use $mysqli em vez de $conn
        $message = "<h2>Dados inseridos/atualizados com sucesso!</h2>";
    } else {
        $message = "<h3>Erro ao inserir/atualizar os dados:</h3> " . $mysqli->error; // Use $mysqli em vez de $conn
    }

    // Feche a conexão com o MySQL
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Orçamento</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-os.css">
</head>
<body>
    <header>
        <h1>Cadastro de serviços</h1>
    </header>

    <ul>
        <li><a href="clientes.php">Listar Clientes</a></li> 
        <li><a href="cadastrar_cliente.php">Cadastrar Cliente</a></li>
        <li><a href="cadastrar_os.php">Cadastrar O.S.</a></li>
        <li><a href="ordemdeservico.php">Exibir O.S.</a></li>
    </ul>
    <button><a href="index.html">Início</a></button>

    <!-- Exibir a mensagem de retorno -->
    <div>
        <?php echo $message; ?>
    </div>
</body>
</html>
