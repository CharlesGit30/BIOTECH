<?php session_start()?>
<?php 
    include '../config/config.php';

    include "../includes/header.php";

  

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        
        $paciente = $_POST['paciente'];
        $medico = $_POST['medico'];
        $exame = $_POST['exame'];
        $data_laudo = $_POST['data_laudo'];
        $diagnostico = $_POST['diagnostico'];
        $observacao = $_POST['observacao'];

        $acao = $conexao->prepare("INSERT INTO laudos (paciente, medico, exame, data_laudo, diagnostico) VALUES (?, ?, ?, ?, ?)");
        $acao->bind_param("sssss", $paciente, $medico, $exame, $data_laudo, $diagnostico);
        $acao->execute();

        header("Location: ../processamento/listar.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Criar Laudo</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
    <h2 class="criar-laudo">Laudo Medico</h2>

    <div class="formulario">
        <form method="POST">
            <label for="paciente">Paciente:</label>
            <input type="text" id="paciente" name="paciente" >
            <label for="medico">Médico:</label>
            <input type="text" id="medico" name="medico" >
    <label for="exame">Exame:</label>
    <input type="text" id="exame" name="exame" >
    <label for="data_laudo">Data do Exame:</label>
    <input type="date" id="data_laudo" name="data_laudo"> 
    <label for="diagnostico">Diagnóstico:</label>
    <textarea id="diagnostico" name="diagnostico"></textarea>
    <button type="submit">Cadastrar</button>
</form>
</div>
<?php include "../includes/footer.php";  ?>

</body>
</html>
