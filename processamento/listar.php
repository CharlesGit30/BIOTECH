<?php session_start()?>
<?php
    include "../config/config.php";
    include "../includes/header.php";

    $resultado = $conexao->query("SELECT * FROM laudos ORDER BY data_laudo DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Listar Laudos</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
    <h2 class="criar-laudo">Lista de Laudos</h2>
<a href="../processamento/criar.php" class="novo-laudo">Novo Laudo</a>

<div class="formulario">
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Medico</th>
        <th>Exame</th>
        <th>Data do Laudo</th>
        <th>Diagnostico</th>
        <th>Alterar</th>
        <th>Excluir</th>       
    </tr>
</div>


    <?php
        while ($row = $resultado->fetch_assoc()) :
    ?>

    <tr>
        <td><?= $row['id']?></td>
        <td><?= $row['paciente']  ?></td>
        <td><?= $row['medico']  ?></td>
        <td><?= $row['exame']  ?></td>
        <td><?= $row['data_laudo']  ?></td>
        <td><?= $row['diagnostico']  ?></td> 
        <td><a href="editar.php?id=<?= $row['id'] ?>" class="editar-laudo">Editar</a></td>
        <td><a href="excluir.php?id=<?= $row['id'] ?>" class="excluir-laudo">Excluir</a></td>   
    </tr>
    <?php endwhile; ?>


</table>

<?php include "../includes/footer.php"; ?>
</body>
</html>

