<?php
include('conexao.php');

$sql_clientes = "SELECT * FROM clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <style>
        /* Estilos globais */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: #333;
            margin: 10px;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        p {
            margin: 10px;
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 1000px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        button a {
            color: #fff;
            text-decoration: none;
        }

        /* Cor dos links Editar e Deletar */
        a.edit-link {
            color: blue;
        }

        a.delete-link {
            color: red;
        }
      
    </style>
</head>
<body>
   <button> <a href="index.html" onclick="submit">Voltar ao início</a> </button>
    <h1>Lista de Clientes</h1>
    <p>Estes são os clientes cadastrados no seu sistema:</p>
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

    <button><a href="cadastrar_cliente.php" onclick="submit">Novo cadastro</a></button>
</body>
</html>
