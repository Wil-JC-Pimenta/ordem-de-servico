<?php 
include('conexao.php');

$sql_os = "SELECT * FROM ordem_de_servico";
$query_os = $mysqli->query($sql_os) or die($mysqli->error);
$num_os = $query_os->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ordens de Serviço</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-ordemdeservico.css">

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
    <div class="container">
        <h2>Lista de Ordens de Serviço</h2>
       
 
        <p>Estas são as ordens de serviço cadastradas no seu sistema:</p>
        <?php if($num_os == 0) { ?>
            <p>Nenhuma ordem de serviço foi cadastrada</p>
        <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>OS</th>
                        <th>Nome</th>
                        <th>Serviço</th>
                        <th>Materiais</th>
                        <th>Mão de Obra</th>
                        <th>Valor Total</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($os = $query_os->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $os['id']; ?></td>
                            <td><?php echo $os['nome_os']; ?></td>
                            <td><?php echo $os['servico']; ?></td>
                            <td><?php echo $os['materiais']; ?></td>
                            <td><?php echo $os['mao_de_obra']; ?></td>
                            <td><?php echo $os['orcamento_total']; ?></td>
                            <td><?php echo $os['date']; ?></td>
                            <td class="actions">
                                <a class="edit" href="editar_os.php?id=<?php echo $os['id']; ?>">Editar</a>
                                <a class="delete" href="deletar_os.php?id=<?php echo $os['id']; ?>">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
    
    <button> <a href="index.html" onclick="submit">Voltar ao início</a> </button>    
</body>
</html>
