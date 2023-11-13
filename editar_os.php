<?php
include('conexao.php');
$id = intval($_GET['id']);
function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    $erro = false;
    $nome_os = $_POST["nome_os"];
    $servico = $_POST["servico"];
    $materiais = $_POST["materiais"];
    $mao_de_obra = $_POST["mao_de_obra"];
    $orcamento_total = $_POST["orcamento_total"];

    if(empty($id)) {
        $erro = "Preencha o número da OS";
    }
    if(empty($nome_os)) {
        $erro = "nome_os";
    }
    if(empty($materiais)) {
        $erro = "materiais";
    }
    if(empty($mao_de_obra)) {
        $erro = "mao_de_obra";
    }
    if(empty($orcamento_total)) {
        $erro = "orcamento_total";
    }
   


    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "UPDATE ordem_de_servico
        SET
        materiais = '$materiais', 
        nome_os = '$nome_os,'
        servico = '$servico', 
        mao_de_obra = '$mao_de_obra',
        orcamento_total = '$orcamento_total'
        WHERE id = '$id'";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cliente atualizado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }

}

$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>

!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Orçamento</title>
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
            max-width: 500px;
        }

        .container a {
            text-decoration: none;
            color: #555;
            margin-right: 10px;
        }

        .container a:hover {
            text-decoration: underline;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="number"],
        input[type="text"],
        textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 95px;
        }

        button {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.html">Início</a>
        <a href="ordemdeservico.php">Voltar para a lista de O.S.</a>
        <form method="POST" action="os.php">
            <div>
                <label for="id">Número da  O.S. :</label>
                <input type="number" name="id" id="id" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>">
            </div>
            <div>
                <label for="nome_os">Nome:</label>
                <input type="text" name="nome_os" id="nome_os" placeholder="Digite o nome do cliente" value="<?php if(isset($_POST['nome_os'])) echo $_POST['nome_os']; ?>">
            </div>
            <div>
                <label for="servico">Serviço a ser executado:</label>
                <textarea name="servico" id="servico" placeholder="Digite a descrição do serviço a ser executado."><?php if(isset($_POST['servico'])) echo $_POST['servico']; ?></textarea>
            </div>
            <div>
                <label for="materiais">Valor dos materiais:</label>
                <input type="text" name="materiais" id="materiais" placeholder="Digite o valor" value="<?php if(isset($_POST['materiais'])) echo $_POST['materiais']; ?>" oninput="calcularOrcamentoTotal()">
            </div>
            <div>
                <label for="mao_de_obra">Valor da mão de obra:</label>
                <input type="text" name="mao_de_obra" id="mao_de_obra" placeholder="Digite o valor" value="<?php if(isset($_POST['mao_de_obra'])) echo $_POST['mao_de_obra']; ?>" oninput="calcularOrcamentoTotal()">
            </div>
            <div>
                <label for="orcamento_total">Orçamento Total:</label>
                <input type="text" name="orcamento_total" id="orcamento_total" value="<?php if(isset($_POST['orcamento_total'])) echo $_POST['orcamento_total']; ?>" readonly>
            </div>
            <button type="submit" name="salvar">Salvar</button>
        </form>
    </div>

    <script>
        function calcularOrcamentoTotal() {
            var materiais = parseFloat(document.getElementById("materiais").value) || 0;
            var mao_de_obra = parseFloat(document.getElementById("mao_de_obra").value) || 0;
            var orcamento_total = materiais + mao_de_obra;

            document.getElementById("orcamento_total").value = orcamento_total.toFixed(2);
        }

        calcularOrcamentoTotal();
    </script>
</body>
</html>
