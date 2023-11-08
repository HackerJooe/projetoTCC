<?php 
    require_once("templates/header.php");

    if($usuarioDAO) {
        $usuarioDAO->destroyToken();
    }
    // $message->inseriMessagem("Você deslogou com sucesso! Volte sempre!", "sucess", "index.php");
    // session_destroy();
?>