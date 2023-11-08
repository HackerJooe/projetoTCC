<?php 
    if(empty($domicilio->imagemdomicilio)){
        $domicilio->imagemdomicilio = "default.png";
    }
?>

            <div class="col-md-3">
                <div class="card domicilio-card">
                    <img class="card-img-top" src="<?= $BASE_URL ?>img/domicilio/<?= $domicilio->imagemdomicilio ?>" alt="imagem residência">
                    <div class="card-header">
                            <p class="card-subtitulo"><span><?= $domicilio->tipodomicilio ?></span></p>
                        </div>
                    <div class="card-body">
                        
                        <h5 class="card-title"><b><?= $domicilio->enderecodom ?></b>, <?= $domicilio->numerodom ?></h5>

                        <p class="localizacao"><span><?= $domicilio->cidadedom?></span> | <span><?= $domicilio->estadodom ?></span></p>

                        <div class="d-flex justify-content-center">
                                <p>
                                    <i class="fa-solid fa-ruler-combined"></i> <?= number_format($domicilio->metragem, 2, ",", ".") ?> M²
                                </p>|  
                                <p>
                                    <i class="fa-solid fa-receipt"></i> R$:<?= number_format($domicilio->mensalidade, 2, ",", ".") ?>
                                </p>     
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <a href="" class="btn favoritar-btn">Favoritar</a>
                        <a href="<?= $BASE_URL ?>domicilios.php?iddomicilio=<?= $domicilio->iddomicilio?>" class="btn card-btn2">Conhecer</a>
                    </div>
                </div>
            </div>