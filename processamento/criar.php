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
    <?php include $root . "/includes/header.php"; ?>

    <main class="page-layout form-page">
        <section class="page-hero page-hero-small">
            <div class="hero-text">
                <span class="eyebrow">Laudos</span>
                <h1>Novo laudo médico</h1>
                <p>Preencha os dados do paciente, médico e exame em um formulário claro, responsivo e otimizado para produtividade.</p>
            </div>
            <div class="hero-actions">
                <a href="/processamento/listar.php" class="btn-secondary">Ver todos os laudos</a>
            </div>
        </section>

        <section class="formulario form-grid">
            <form method="POST" action="/processamento/criar.php">
                <div class="field-row">
                    <label for="paciente">Paciente</label>
                    <input type="text" id="paciente" name="paciente" required>
                </div>
                <div class="field-row">
                    <label for="medico">Médico</label>
                    <input type="text" id="medico" name="medico" required>
                </div>
                <div class="field-row">
                    <label for="exame">Exame</label>
                    <input type="text" id="exame" name="exame" required>
                </div>
                <div class="field-row">
                    <label for="data_laudo">Data do Exame</label>
                    <input type="date" id="data_laudo" name="data_laudo" required>
                </div>
                <div class="field-row full-width">
                    <label for="diagnostico">Diagnóstico</label>
                    <textarea id="diagnostico" name="diagnostico" required></textarea>
                </div>
                <div class="field-row full-width">
                    <label for="observacao">Observação</label>
                    <textarea id="observacao" name="observacao"></textarea>
                </div>
                <button type="submit" class="btn-primary">Cadastrar laudo</button>
            </form>
        </section>
    </main>

    <?php include $root . "/includes/footer.php"; ?>
</body>
</html>
