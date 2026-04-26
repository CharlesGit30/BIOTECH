<?php
    include "config.php";

    $resultado = $conexao->query("SELECT * FROM laudos ORDER BY data_laudo DESC");
?>

<h2>Lista de Laudos</h2>
<a href="criar.php">Novo Laudo</a>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Medico</th>
        <th>Exame</th>
        <th>Data do Laudo</th>
        <th>Diagnostico</th>
        <th>Observação</th>
        
    </tr>

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
        <td><?= $row['observacao']  ?></td> 
        <td><a href="editar.php?id=<?= $row['id'] ?>">Editar</a></td>
        <td><a href="excluir.php?id=<?= $row['id'] ?>">Excluir</a></td>   
    </tr>
    <?php endwhile; ?>


</table>