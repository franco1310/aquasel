<?php
    session_start();
    require_once '../controller/usuarioController.php';
    usuarioController::login();
?>