<?php
    require_once("globals.php");
    require_once("db.php");
    require_once("dao/UsuarioDAO.php");
    require_once("models/messagens.php");

    $message = new messagens($BASE_URL);

    $usuarioDAO = new UsuarioDAO($conn, $BASE_URL);
    
    $usuarioData = $usuarioDAO->verifyToken();
    
    $flashMessage = $message->pegarMessagem();
    
    if (!empty($flashMessage["msg"])) {
        $message->limparMessagem();
    }
   
    //print_r($usuarioData); exit;
    if(!empty($usuarioData)){
        $usuariotype = $usuarioData->tipousuario;  
    } else {
        $usuariotype = "";
    }
    //print_r($usuariotype); //confirmaçao para fazer a condicao do tipo do usuario que está logando
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACILITA - Movendo a sua vida!</title>
    <link rel="short icon" href="<?= $BASE_URL?>img/empresa/facilitapng.png">
    <!-- BOOTSTRAP CSS EXTERNO -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- FONT AWESOME EXTERNO CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS INTERNO -->
    <link rel="stylesheet" href="<?= $BASE_URL?>css/style_index.css">
    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body onload="switchTheme()">
    <header class="navbar navbar-expand-lg bd-navbar background">
        <nav id="main-navbar" class="container-xxl bd-gutter flex-wrap flex-lg-nowrap">
            <div class="container-fluid">
                <a href="<?= $BASE_URL?>" class="navbar-brand">
                    <img src="<?= $BASE_URL?>img/empresa/facilitasvg.svg" id="logo" alt="Facilita">
                    <span id="title-logo">ACILITA</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                
                    <div class="collapse navbar-collapse text-center navbar-nav-scroll" id="navbarScroll">
                            <div id="switchThemeDiv">
                                <input type="checkbox" class="checkbox" name="switchTheme" id="switchTheme" onclick="switchTheme()">
                                <label class="label" for="switchTheme">
                                    <svg class="moon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                        <path d="M3.32031 11.6835C3.32031 16.6541 7.34975 20.6835 12.3203 20.6835C16.1075 20.6835 19.3483 18.3443 20.6768 15.032C19.6402 15.4486 18.5059 15.6834 17.3203 15.6834C12.3497 15.6834 8.32031 11.654 8.32031 6.68342C8.32031 5.50338 8.55165 4.36259 8.96453 3.32996C5.65605 4.66028 3.32031 7.89912 3.32031 11.6835Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <svg class="sun" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 3V4M12 20V21M4 12H3M6.31412 6.31412L5.5 5.5M17.6859 6.31412L18.5 5.5M6.31412 17.69L5.5 18.5001M17.6859 17.69L18.5 18.5001M21 12H20M16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </label>
                                
                            </div>
                        <ul class="navbar-nav me-auto my-2 my-lg-0">
                            
                            <li class="nav-item" role="button"><a class="nav-link" href="<?= $BASE_URL?>index.php">Home</a></li>
                            <?php if($usuariotype == ""):?>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Estados
                                </a>
                                    <ul class="dropdown-menu">
                                        <span class="navbar-text letra-span">A</span>
                                        <li><a class="dropdown-item" href="index.php?#acre">Acre</a></li>
                                        <li><a class="dropdown-item" href="#alagoas">Alagoas</a></li>
                                        <li><a class="dropdown-item" href="#amapa">Amapá</a></li>
                                        <li><a class="dropdown-item" href="#amazonas">Amazonas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">B</span>
                                        <li><a class="dropdown-item" href="#bahia">Bahia</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">C</span>
                                        <li><a class="dropdown-item" href="#ceara">Ceará</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">E</span>
                                        <li><a class="dropdown-item" href="#espiritoSanto">Espírito Santo</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">G</span>
                                        <li><a class="dropdown-item" href="#goias">Goias</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">M</span>
                                        <li><a class="dropdown-item" href="#maranhao">Maranhão</a></li>
                                        <li><a class="dropdown-item" href="#matogrosso">Mato Grosso</a></li>
                                        <li><a class="dropdown-item" href="#matogrossodosul">Mato Grosso do Sul</a></li>
                                        <li><a class="dropdown-item" href="#minasgerais">Minas Gerais</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">P</span>
                                        <li><a class="dropdown-item" href="#para">Pará</a></li>
                                        <li><a class="dropdown-item" href="#paraiba">Paraíba</a></li>
                                        <li><a class="dropdown-item" href="#parana">Paraná</a></li>
                                        <li><a class="dropdown-item" href="#pernambuco">Pernambuco</a></li>
                                        <li><a class="dropdown-item" href="#piaui">Piauí</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">R</span>
                                        <li><a href="#riodejaneiro" class="dropdown-item">Rio de Janeiro</a></li>
                                        <li><a class="dropdown-item" href="#riograndedonorte">Rio Grande do Norte</a></li>
                                        <li><a class="dropdown-item" href="#riograndedosul">Rio Grande do Sul</a></li>
                                        <li><a class="dropdown-item" href="#rondonia">Rondônia</a></li>
                                        <li><a class="dropdown-item" href="#roraima">Roraima</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">S</span>
                                        <li><a class="dropdown-item" href="#santacatarina">Santa Catarina</a></li>
                                        <li><a class="dropdown-item" href="#saopaulo">São Paulo</a></li>
                                        <li><a class="dropdown-item" href="#sergipe">Sergipe</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">T</span>
                                        <li><a class="dropdown-item" href="#tocantins">Tocantins</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php 
                            if($usuariotype === 2): 
                            ?>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Estados
                                </a>
                                    <ul class="dropdown-menu">
                                        <span class="navbar-text letra-span">A</span>
                                        <li><a class="dropdown-item" href="#acre">Acre</a></li>
                                        <li><a class="dropdown-item" href="#alagoas">Alagoas</a></li>
                                        <li><a class="dropdown-item" href="#amapa">Amapá</a></li>
                                        <li><a class="dropdown-item" href="#amazonas">Amazonas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">B</span>
                                        <li><a class="dropdown-item" href="#bahia">Bahia</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">C</span>
                                        <li><a class="dropdown-item" href="#ceara">Ceará</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">E</span>
                                        <li><a class="dropdown-item" href="#espiritoSanto">Espírito Santo</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">G</span>
                                        <li><a class="dropdown-item" href="#goias">Goias</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">M</span>
                                        <li><a class="dropdown-item" href="#maranhao">Maranhão</a></li>
                                        <li><a class="dropdown-item" href="#matogrosso">Mato Grosso</a></li>
                                        <li><a class="dropdown-item" href="#matogrossodosul">Mato Grosso do Sul</a></li>
                                        <li><a class="dropdown-item" href="#minasgerais">Minas Gerais</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">P</span>
                                        <li><a class="dropdown-item" href="#para">Pará</a></li>
                                        <li><a class="dropdown-item" href="#paraiba">Paraíba</a></li>
                                        <li><a class="dropdown-item" href="#parana">Paraná</a></li>
                                        <li><a class="dropdown-item" href="#pernambuco">Pernambuco</a></li>
                                        <li><a class="dropdown-item" href="#piaui">Piauí</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">R</span>
                                        <li><a href="#riodejaneiro" class="dropdown-item">Rio de Janeiro</a></li>
                                        <li><a class="dropdown-item" href="#riograndedonorte">Rio Grande do Norte</a></li>
                                        <li><a class="dropdown-item" href="#riograndedosul">Rio Grande do Sul</a></li>
                                        <li><a class="dropdown-item" href="#rondonia">Rondônia</a></li>
                                        <li><a class="dropdown-item" href="#roraima">Roraima</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">S</span>
                                        <li><a class="dropdown-item" href="#santacatarina">Santa Catarina</a></li>
                                        <li><a class="dropdown-item" href="#saopaulo">São Paulo</a></li>
                                        <li><a class="dropdown-item" href="#sergipe">Sergipe</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">T</span>
                                        <li><a class="dropdown-item" href="#tocantins">Tocantins</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                                        <?= $usuarioData->nome ?>
                                    </a>
                                </li>
                            <?php elseif($usuariotype === 1 ): ?>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Estados
                                </a>
                                    <ul class="dropdown-menu">
                                        <span class="navbar-text letra-span">A</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#acre">Acre</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#alagoas">Alagoas</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#amapa">Amapá</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#amazonas">Amazonas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">B</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#bahia">Bahia</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">C</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#ceara">Ceará</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">E</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#espiritoSanto">Espírito Santo</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">G</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#goias">Goias</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">M</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#maranhao">Maranhão</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#matogrosso">Mato Grosso</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#matogrossodosul">Mato Grosso do Sul</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#minasgerais">Minas Gerais</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">P</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#para">Pará</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#paraiba">Paraíba</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#parana">Paraná</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#pernambuco">Pernambuco</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#piaui">Piauí</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">R</span>
                                        <li><a href="<?= $BASE_URL?>index.php?#riodejaneiro" class="dropdown-item">Rio de Janeiro</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#riograndedonorte">Rio Grande do Norte</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#riograndedosul">Rio Grande do Sul</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#rondonia">Rondônia</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#roraima">Roraima</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">S</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#santacatarina">Santa Catarina</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#saopaulo">São Paulo</a></li>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#sergipe">Sergipe</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <span class="navbar-text letra-span">T</span>
                                        <li><a class="dropdown-item" href="<?= $BASE_URL?>index.php?#tocantins">Tocantins</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $BASE_URL ?>new_domicilio.php" class="nav-link">
                                        <i class="fa-solid fa-plus"></i> Incluir Domícilio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link">
                                        <i class="fa-solid fa-house"></i>Meus Domícilios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                                        <?= $usuarioData->nome ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php 
                            if(!empty($usuarioData)): ?>
                                <li class="nav-item">
                                    <button type="button" class="btn"><a class="nav-link" href="<?= $BASE_URL ?>logout.php">SAIR</a></button>
                                </li>
                            <?php elseif(empty($usuarioData)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $BASE_URL ?>authentic.php">ENTRAR / CADASTRAR</a>
                                </li>
                            <?php endif; ?>
                            <form action="" method="GET" id="buscar-form" class="d-flex" role="search">
                                <input type="text" name="q" id="buscar" class="form-control me-2" type="search" placeholder="Buscar Residências" aria-label="Search">
                                <button class="btn btn-outline-sucess" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </ul>
                    </div>
            </div>
        </nav>  
        
    </header>
    <?php if(!empty($flashMessage["msg"])): ?>
        <div class="msg-container">
            <p class="msg <?= $flashMessage["type"] ?>"><?= $flashMessage["msg"]?> </p>
        </div>
    <?php endif; ?>
    <script src="<?= $BASE_URL ?>js/switchTheme.js"></script>