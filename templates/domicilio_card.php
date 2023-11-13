<?php 

    if(empty($domicilio->imagemdomicilio)){
        $domicilio->imagemdomicilio = "default.png";
    }

?>

<div class="col-md-3">
<div class="card">
  <div class="content">
    <div class="back">
      <div class="back-content">
        <img class="card-img-top" src="<?= $BASE_URL ?>img/domicilio/<?= $domicilio->imagemdomicilio ?>" alt="imagem residência">
        <div class="description">
            <strong><?= $domicilio->enderecodom ?>, <?= $domicilio->numerodom ?></strong><br>
            <span><?= $domicilio->cidadedom?></span> | <span><?= $domicilio->estadodom ?></span>
        </div>
      </div>
    </div>
    <div class="front">
      
      <div class="img">
        <div class="circle">
        </div>
        <div class="circle" id="right">
        </div>
        <div class="circle" id="bottom">
        </div>
      </div>

      <div class="front-content">
        <small class="badge"><span><?= $domicilio->tipodomicilio ?></span></small>
        <div class="description">
          <div class="divtitle">
            <p class="title">
              <strong><b><?= $domicilio->enderecodom ?></b>, <?= $domicilio->numerodom ?></strong>
            </p>
            <span><?= $domicilio->cidadedom?> | <?= $domicilio->estadodom ?></span>
            <br>
            <p class="text-center">
              <i class="fa-solid fa-ruler-combined"></i> <?= number_format($domicilio->metragem, 2, ",", ".") ?> M²
              &nbsp;|&nbsp;  
              <i class="fa-solid fa-receipt"></i> R$:<?= number_format($domicilio->mensalidade, 2, ",", ".") ?>
            </p> 
            
          </div>
          <div class="card-footer">
            <a href="" class="btn favoritar-btn">Favoritar</a>
            <a href="<?= $BASE_URL ?>domicilios.php?iddomicilio=<?= $domicilio->iddomicilio?>" class="btn card-btn2">Conhecer</a>
            
          </div>
          
          <p class="card-footer">
            <div class="list-caract">
                    <li class="card-text"><?= $domicilio->caracteristicas ?></li>
            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

          