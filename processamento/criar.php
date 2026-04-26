<?php 
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        
        $paciente = $_POST['paciente'];
        $medico = $_POST['medico'];
        $exame = $_POST['exame'];
        $data_laudo = $_POST['data_laudo'];
        $diagnostico = $_POST['diagnostico'];
        $observacao = $_POST['observacao'];

        $acao = $conexao->prepare("INSERT INTO laudos (paciente, medico, exame, data_laudo, diagnostico, observacao) VALUES (?, ?, ?, ?, ?, ?)");
        $acao->bind_param("ssssss", $paciente, $medico, $exame, $data_laudo, $diagnostico, $observacao);
        $acao->execute();

        header("Location: listar.php");
    }
?>

<h2>Laudo Medico</h2>

<form method="POST">
    Paciente: <input type="text" name="paciente" >
    Medico: <input type="text" name="medico" >
    Exame: <input type="text" name="exame" >
    Data do Exame: <input type="date" name="data_laudo"> 
    Diagnostico: <textarea name="diagnostico"></textarea>
    Observacoes: <textarea name="observacao"></textarea>

    <button type="submit">Cadastrar</button>
</form>