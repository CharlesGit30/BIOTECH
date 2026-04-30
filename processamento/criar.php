<?php
session_start();

$root = !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '/var/www/html';

include $root . "/config/config.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $paciente = $_POST['paciente'];
    $medico = $_POST['medico'];
    $exame = $_POST['exame'];
    $data_laudo = $_POST['data_laudo'];
    $diagnostico = $_POST['diagnostico'];
    $observacao = $_POST['observacao'] ?? '';

    $acao = $conexao->prepare("INSERT INTO laudos (paciente, medico, exame, data_laudo, diagnostico, observacao) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$acao) {
        die("Erro no prepare: " . $conexao->error);
    }

    $acao->bind_param("ssssss", $paciente, $medico, $exame, $data_laudo, $diagnostico, $observacao);

    if (!$acao->execute()) {
        die("Erro ao salvar: " . $acao->error);
    }

    header("Location: /processamento/listar.php");
    exit;
}

include $root . "/includes/header.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Criar Laudo</title>
   <link rel="stylesheet" href="/includes/style.css">
</head>
<body>
    <h2 class="criar-laudo">Laudo Medico</h2>

    <div class="formulario">
      <form method="POST" action="/processamento/criar.php">
            <label for="paciente">Paciente:</label>
            <input type="text" id="paciente" name="paciente" >
            <label for="medico">Médico:</label>
            <input type="text" id="medico" name="medico" >
    <label for="exame">Exame:</label>
    <input type="text" id="exame" name="exame" >
    <label for="data_laudo">Data do Exame:</label>
    <input type="date" id="data_laudo" name="data_laudo"> 
    <label for="diagnostico">Diagnóstico:</label>
<textarea id="diagnostico" name="diagnostico" required></textarea>

<label for="observacao">Observação:</label>
<textarea id="observacao" name="observacao"></textarea>

<button type="submit">Cadastrar</button>
</form>
</div>
<?php include $root . "/includes/footer.php"; ?>

</body>
</html>
