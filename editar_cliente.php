<?php

include('conexao.php');
$id = intval($_GET['id']);

function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {
    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];

    if(empty($nome)) {
        $erro = "Preencha o nome";
    }
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o e-mail";
    }

    if(!empty($nascimento)) { 
        $pedacos = explode('/', $nascimento);
        if(count($pedacos) == 3) {
            $nascimento = implode ('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }

    if(!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11) {
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
        }
    }

    if($erro) {
        $message = "<p class='error'><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "UPDATE clientes
        SET nome = '$nome', 
        email = '$email', 
        telefone = '$telefone',
        nascimento = '$nascimento'
        WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            $message = "<p class='success'><b>Cliente atualizado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }
}

$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style-cadastrar-cliente.css">
    <style>
        .message {
            text-align: center;
            margin: 20px 0;
            font-size: 18px;
            color: green;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        .container {
            text-align: center;
        }
    
    </style>
</head>
<body>
    <header>
        <h1>Editar Cliente</h1>
    </header>
    <ul>
        <li><a href="clientes.php">Listar Clientes</a></li> 
        <li><a href="cadastrar_cliente.php">Cadastrar Cliente</a></li>
        <li><a href="cadastrar_os.php">Cadastrar O.S.</a></li>
        <li><a href="ordemdeservico.php">Exibir O.S.</a></li>
    </ul>
    <section class="home-blog bg-sand">
        <div class="container">
            <?php if(isset($message)) echo "<div class='message'>$message</div>"; ?>
            <form method="POST" action="">
                <p>
                    <label>Nome:</label>
                    <input value="<?php echo $cliente['nome']; ?>" name="nome" type="text">
                </p>
                <p>
                    <label>E-mail:</label>
                    <input value="<?php echo $cliente['email']; ?>" name="email" type="text">
                </p>
                <p>
                    <label>Telefone:</label>
                    <input value="<?php if(!empty($cliente['telefone'])) echo formatar_telefone($cliente['telefone']); ?>" placeholder="(11) 98888-8888" name="telefone" type="text">
                </p>
                <p>
                    <label>Data de Nascimento:</label>
                    <input value="<?php if(!empty($cliente['nascimento'])) echo formatar_data($cliente['nascimento']); ?>" name="nascimento" type="text">
                </p>
                <button type="submit">Salvar Cliente</button>
            </form>
            <button><a href="clientes.php">Voltar para a lista de clientes</a></button>
        </div>
    </section>
</body>
</html>
