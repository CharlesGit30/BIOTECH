<?php
session_start();

if (!isset($_SESSION['medico_id'])) {
    header("Location: ../biotech/login/login.php");
    exit;
}