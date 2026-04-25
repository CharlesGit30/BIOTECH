<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    

<?php 
    session_start();
    include "../config.php";

    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $tipo = $_POST['tipo'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    $composicao = $_POST['composicao'];
    $data_registro = $_POST['data_registro'];

    $instrucao = $conexao->prepare("INSERT INTO medicamentos (nome, fabricante, tipo, quantidade, validade, composicao, data_registro) VALUES (?, ?, ?, ?, ?, ?, ?)");    
    $instrucao->bind_param("ssssssss", $nome, $fabricante, $tipo, $quantidade, $validade, $composicao, $data_registro);
    $instrucao->execute();

    if($instrucao->num_rows > 0){
        $_SESSION['mensagem'] = "Medicamento cadastrado com sucesso!";
        header("Location: ../dashboard.php");
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar medicamento.";
        header("Location: ../dashboard.php");
    }
    $instrucao->close();
    $conexao->close();
?>

</body>
</html>