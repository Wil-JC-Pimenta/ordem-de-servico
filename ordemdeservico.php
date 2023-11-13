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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 900px;
        }

        .container a {
            text-decoration: none;
            color: #555;
            margin-right: 10px;
        }

        .container a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
        }

        .actions a.edit {
            color: blue;
        }

        .actions a.delete {
            color: red;
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
    </style>
</head>
<body>
    <div class="container">
    <button> <a href="index.html" onclick="submit">Voltar ao início</a> </button>
        <h1>Lista de Ordens de Serviço</h1>
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
    
</body>
</html>
