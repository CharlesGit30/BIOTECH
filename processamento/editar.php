<?php
include '../config.php';

$id = $_GET['id'];


$stmt = $conexao->prepare("SELECT * FROM laudos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$laudo = $result->fetch_assoc();


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $paciente = $_POST['paciente'];
    $medico = $_POST['medico'];
    $exame = $_POST['exame'];
    $data_laudo = $_POST['data_laudo'];
    $diagnostico = $_POST['diagnostico'];
    $observacao = $_POST['observacao'];

    $update = $conexao->prepare("UPDATE laudos SET paciente=?, medico=?, exame=?, data_laudo=?, diagnostico=?, observacao=? WHERE id=?");
    $update->bind_param("ssssssi", $paciente, $medico, $exame, $data_laudo, $diagnostico, $observacao, $id);
    $update->execute();

    header("Location: ../processamento/listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Editar Laudo</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>  

<?php include "../includes/header.php"; ?>
<h2 class="editar-laudo">Editar Laudo</h2>

<div class="formulario">
    <form method="POST">
    Paciente: <input type="text" name="paciente" value="<?= $laudo['paciente'] ?>"><br>
    Médico: <input type="text" name="medico" value="<?= $laudo['medico'] ?>"><br>
    Exame: <input type="text" name="exame" value="<?= $laudo['exame'] ?>"><br>
    Data: <input type="date" name="data_laudo" value="<?= $laudo['data_laudo'] ?>"><br>
    Diagnóstico: <textarea name="diagnostico"><?= $laudo['diagnostico'] ?></textarea><br>
    Observação: <textarea name="observacao"><?= $laudo['observacao'] ?></textarea><br>

    <button type="submit">Salvar</button>
</form>
</div>

</body>
</html>

