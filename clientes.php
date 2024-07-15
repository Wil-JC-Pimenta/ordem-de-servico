<?php
include('conexao.php');

$sql_clientes = "SELECT * FROM clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-clientes.css">
</head>
<body>
    <h1>LISTA DE CLIENTES</h1>
    <ul>
        <li><a href="clientes.php">Listar Clientes</a></li> 
        <li><a href="cadastrar_cliente.php">Cadastrar Cliente</a></li>
        <li><a href="cadastrar_os.php">Cadastrar O.S.</a></li>
        <li><a href="ordemdeservico.php">Exibir O.S.</a></li>
    </ul>
    <button> <a href="index.html" onclick="submit">Voltar ao início</a> </button>  

    <h2>Estes são os clientes cadastrados no seu sistema:</h2>

    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Nascimento</th>
            <th>Data de Cadastro</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php if($num_clientes == 0) { ?>
                <tr>
                    <td colspan="7">Nenhum cliente foi cadastrado</td>
                </tr>
            <?php 
            } else {
                while ($cliente = $query_clientes->fetch_assoc()) {
                
                $telefone = "Não informado";
                if(!empty($cliente['telefone'])) {
                    $telefone = formatar_telefone($cliente['telefone']);
                }
                $nascimento = "Não informada";
                if(!empty($cliente['nascimento'])) {
                    $nascimento = formatar_data($cliente['nascimento']);
                }
                $data_cadastro = date("d/m/Y H:i", strtotime($cliente['data']));
                ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $telefone; ?></td>
                    <td><?php echo $nascimento; ?></td>
                    <td><?php echo $data_cadastro; ?></td>
                    <td>
                        <a class="edit-link" href="editar_cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                        <a class="delete-link" href="deletar_cliente.php?id=<?php echo $cliente['id']; ?>">Deletar</a>
                    </td>
                </tr>
                <?php
                }
            } ?>
        </tbody>
    </table>

</body>
</html>