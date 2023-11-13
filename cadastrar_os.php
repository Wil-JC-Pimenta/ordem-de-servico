<?php
function limpar_texto($str){ 
    // Substitui vírgulas por pontos e remove caracteres não numéricos
    $str = str_replace(",", ".", $str);
    return preg_replace("/[^0-9.]/", "", $str); 
}

if(count($_POST) > 0) {
    include('conexao.php');
    
    $erro = false;
    $id = $_POST['id'];
    $nome_os = $_POST['nome_os'];
    $servico = $_POST['servico'];
    
    // Verifica se as variáveis estão definidas antes de limpar e converter para float
    $materiais = isset($_POST['materiais']) ? limpar_texto($_POST['materiais']) : null;
    $mao_de_obra = isset($_POST['mao_de_obra']) ? limpar_texto($_POST['mao_de_obra']) : null;

    // Verifica se as variáveis são numéricas
    if (!is_numeric($materiais) || !is_numeric($mao_de_obra)) {
        $erro = "Os valores de materiais e mão de obra devem ser numéricos";
    }

    if(empty($id) || !is_numeric($id)) {
        $erro = "Número da O.S. inválido";
    }

    if(empty($nome_os)) {
        $erro = "Preencha o nome do cliente";
    }

    if(empty($servico)) {
        $erro = "Preencha a descrição do serviço";
    }

    if($erro) {
        echo "<p class='error'><b>ERRO: $erro</b></p>";
    } else {
        // Agora podemos utilizar $materiais e $mao_de_obra com segurança
        $orcamento_total = $materiais + $mao_de_obra;

        $sql_code = "INSERT INTO ordem_de_servico (id, nome_os, servico, materiais, mao_de_obra, orcamento_total, date) 
        VALUES ('$id', '$nome_os', '$servico', '$materiais', '$mao_de_obra', '$orcamento_total', NOW())";

        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);

        if($deu_certo) {
            echo "<p class='success'><b>Ordem de Serviço cadastrada com sucesso!!!</b></p>";
            unset($_POST);
        }
    }
}
?>

<!DOCTYPE html>
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

        <button><a href="index.html" onclick="submit">Início</a></button>
        <button> <a href="ordemdeservico.php" onclick="submit">Voltar para a lista de O.S.</a> </button>
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
