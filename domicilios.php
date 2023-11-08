<?php 
    require_once("templates/header.php");

    require_once("dao/DomicilioDAO.php");
    require_once("models/domicilio.php");

    // PEGA O ID DO DOMICILIO QUE VEM ATRAVÉS DA REQUISIÇÃO GET PELO ENDEREÇO URL
    $iddomicilio = filter_input(INPUT_GET, "iddomicilio");
    $domicilioDao = new DomicilioDAO($conn, $BASE_URL);;
    $domicilio = [];

    
    // print_r($usuarioData);
    // print_r($domicilioData);

    if(!$iddomicilio) {
        $message->inseriMessagem("Id Domicilio não encontrado, você será redirecionado!", "error", "back");
    } else {
        
        $domicilio = $domicilioDao->findById($iddomicilio);
        

        if (empty($domicilio)) {
            $message->inseriMessagem("Id Domicilio não encontrado, você será redirecionado!", "error", "index.php");
        } else {
             $domicilio;
        }
    }
    
    $usuarioOwnsDomicilio = false;

    if(!empty($usuarioData)) {
        if($usuarioData->idusuario == $domicilio->usuario_id) {
            $usuarioOwnsDomicilio = true;
        }
    }

    // print_r($domicilio);
    $array[] = $domicilio->caracteristicas;
    $array1 = implode(', ', $array);
    $arrayseparado = explode(", ", $array1);

    $arrayAdc[] = $domicilio->caracteristicasadc;
    $arrayAdc1 = implode('', $arrayAdc);
    $arraySeparadoAdc = explode(", ", $arrayAdc1);
    //print_r($arrayseparado);
    //print_r($arraySeparadoAdc);
    
?>
<div id="main-container" class="container-fluid">
    <div class="row">
        <div id="domicilio-view" class="col-xs-12 col-md-12 domicilio-container">
            <h1 class="section-titulo titulo-domicilio"><i class="fa-solid fa-house"></i> ID DOMICILIO: <span class="dados"><?= $domicilio->iddomicilio ?></span>| <i class="fa-regular fa-user"></i> ID PROPRIETÁRIO: <span class="dados"><a href=""><?= $domicilio->usuario_id ?></a></span></h1>

            <div class="imagens-domicilio">
                <div id="imagem1">
                    <img src="<?= $BASE_URL ?>img/domicilio/<?= $domicilio->imagemdomicilio ?>" alt="imagem1">
                </div>
                <div id="imagem2">
                    <img src="<?= $BASE_URL ?>img/domicilio/<?= $domicilio->imagemdomicilio ?>" alt="imagem2">
                </div>
                <div id="imagem3">
                    <img src="<?= $BASE_URL ?>img/domicilio/<?= $domicilio->imagemdomicilio ?>" alt="imagem3">
                </div>
                <div id="imagem4">
                    <img src="<?= $BASE_URL ?>img/domicilio/<?= $domicilio->imagemdomicilio ?>" alt="imagem4">
                </div>

            </div>  
            
            <div class="dados-domicilio">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item ativo" data-nome="aba1" onclick="mostrar()">
                            <button id="btnaba1" class="nav-link" data-nome="aba1" onclick="mostrar()">DOMICILIO - ID: <?= $domicilio->iddomicilio ?></span></button>
                        </li>
                        <li class="nav-item" data-nome="aba2" onclick="mostrar()">
                            <button id="btnaba2" class="nav-link"  data-nome="aba2" onclick="mostrar()">DETALHES</button>
                        </li>
                        </ul>
                    </div>
                    <div class="card-body" id="aba1">
                        <h5 class="card-title text-start"><?= $domicilio->enderecodom ?>, N° <?= $domicilio->numerodom ?>, Comp.: <?= $domicilio->complementodom ?></h5>
                        <table class="table">
                            <tr><td style="border-radius: 10px 0 0 0">Tipo Domicilio:</td><td style="border-radius: 0 10px 0 0"><?= $domicilio->tipodomicilio ?></td></tr>
                            <tr><td>Metragem:</td><td><?= $domicilio->metragem ?> M²</td></tr>
                            <tr><td>CEP:</td><td><?= $domicilio->cepdom ?></td></tr>
                            <tr><td>Cidade:</td><td><?= $domicilio->cidadedom ?></td></tr>
                            <tr><td>Estado:</td><td><?= $domicilio->estadodom ?></td></tr>
                            <tr><td>Mensalidade(R$):</td><td><?= number_format($domicilio->mensalidade, 2, ",", ".") ?></td></tr>
                            <tr><td style="border-radius: 0 0 0 10px">IPTU(R$):</td><td style="border-radius: 0 0 10px 0"><?= number_format($domicilio->iptu, 2, ",", ".") ?></td></tr>
                        </table>
                        <a href="#" class="btn btn-primary">Conversar com o Locador</a>
                    </div>
                    <div class="card-body" id="aba2" hidden>
                        <h6 class="card-title text-start">CARACTERÍSTICAS:</h6>
                        <div class="list-caract">
                            <?php foreach($arrayseparado as $caracteristica): ?>
                                <li class="card-text"><?= $caracteristica ?></li>
                            <?php endforeach;  ?>
                        </div>

                        <h6 class="card-title text-start">CARACTERÍSTICAS ADICIONAIS:</h6>
                        <div class="list-caract">
                            <?php if(!empty($domicilio->caracteristicasadc)): ?>
                                <?php foreach($arraySeparadoAdc as $caracteristicasadc): ?>
                                    <li class="card-text"><?= $caracteristicasadc ?></li>
                                <?php endforeach;  ?>
                            <?php else: ?>
                            <li class="card-text">Nenhuma característica adicional descrita pelo proprietário.</li>
                            <?php endif; ?>

                        </div>
                        <h6 class="card-title2 text-start">DESCRIÇÃO DO PROPRIETÁRIO:</h6>
                        
                        <div class="descricao">
                            <p class="card-text"><?= $domicilio->descricao ?></p>
                        </div>

                        <a href="#" class="btn btn-primary">Conversar com o Locador</a>
                    </div>
                </div>
            </div>
    
        </div>
        
    
        
      
        
</div>

<script>
    const btn = document.querySelectorAll('li');

    btn.forEach(button=>{
        button.addEventListener("click", ()=> {
            btn.forEach(newbtn=> newbtn.classList.remove('ativo'));
            
            button.classList.add('ativo');
            
        })
    })
    
</script>
    
<script src="<?= $BASE_URL ?>js/domicilios.js"></script>

<?php 
    require_once("templates/footer.php");

?>