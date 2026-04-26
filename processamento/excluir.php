<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $conexao->prepare("DELETE FROM laudos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: listar.php");
exit;