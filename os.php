<?php
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
        echo "Dados inseridos/atualizados com sucesso!";
    } else {
        echo "Erro ao inserir/atualizar os dados: " . $mysqli->error; // Use $mysqli em vez de $conn
    }

    // Feche a conexão com o MySQL
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Orçamento</title>
    <link rel="stylesheet" href="styles/style-os.css">

<body>

<a href="index.html">Inicio</a>



</body>