<?php 
    require_once("dao/DomicilioDAO.php");
    require_once("models/domicilio.php");
    include_once("dbcarousel.php");

    $domicilioDao = new DomicilioDAO($conn, $BASE_URL);

    $lastestDomicilio = $domicilioDao->getLatestDomicilios();
    // print_r($lastestDomicilio);

    if(!empty($domicilio->imagemdomicilio)){
        $domicilio->imagemdomicilio = "default.png";
    }

    
?>

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <?php 
        $controleactive = 2 ;
        $contador = 0;
        $resultcarousel = "SELECT * FROM domicilios ORDER BY iddomicilio ASC LIMIT 4;";
        $resultado_carrousel = mysqli_query($conn2, $resultcarousel);
        while($row_carousel = mysqli_fetch_array($resultado_carrousel)) {
            if(empty($row_carousel['imagemdomicilio'])){
                $row_carousel['imagemdomicilio'] = 'default.png';
            }
            
                if($controleactive == 2){ ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $contador; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $contador; ?>"></button>
                    <?php
                    $controleactive = 1;
                    $contador++;
                } else { ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $contador; ?>" aria-label="Slide
                    <?php echo $contador; ?>"></button>
                    <?php
                    if ($contador > 4)  $contador = 0;

                    $contador++;
                } 
        }
    ?>
  </div>
  <div class="carousel-inner">
    <?php 
    $controleactive = 2 ;
    $resultcarousel = "SELECT * FROM domicilios ORDER BY iddomicilio ASC LIMIT 4;";
    $resultado_carrousel = mysqli_query($conn2, $resultcarousel);
    // print_r($resultado_carrousel);
    while($row_carousel = mysqli_fetch_assoc($resultado_carrousel)) {
        
        if(empty($row_carousel['imagemdomicilio'])){
            $row_carousel['imagemdomicilio'] = 'default.png';
        }
        if($controleactive == 2){ ?>
                <div class="carousel-item active">
                    <span class="typedom">
                        <span class="titulo-type">Tipo de Residência:</span>
                        <span class="type-dom"><?php echo $row_carousel['tipodomicilio'];?></span>
                        
                        <span class="titulo-metragem"><i class="fa-solid fa-ruler-combined"></i> : <?php echo $row_carousel['metragem'] ?> M²</span>
                    </span>
                    <img src="<?= $BASE_URL?>img/domicilio/<?php echo $row_carousel['imagemdomicilio']; ?>" class="d-block w-100 carousel-img" alt="">
                    <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-bg-light"><?php echo $row_carousel['enderecodom']. ', ';  echo $row_carousel['numerodom'];?></h3>
                    <p class="lead">ALUGUEL(R$): <?php echo number_format($row_carousel['mensalidade'], 2, ',', '.'). ' | ';  ?>IPTU(R$): <?php echo number_format($row_carousel['iptu'], 2, ',','.'); ?></p>
                    <a href="<?= $BASE_URL?>domicilios.php?iddomicilio=<?php echo ($row_carousel['iddomicilio'])?>" class="btn card-btn2 btn-carousel">Conhecer</a>
                    </div>
                </div> 
                
            <?php
            $controleactive = 1;
        } else { ?>
                <div class="carousel-item">
                    <span class="typedom">
                        <span class="titulo-type">Tipo de Residência:</span>
                        <?php echo $row_carousel['tipodomicilio'];?>
                        <span class="titulo-metragem"><i class="fa-solid fa-ruler-combined"></i> : <?php echo $row_carousel['metragem'] ?> M²</span>
                    </span>
                    <img src="<?= $BASE_URL?>img/domicilio/<?php echo $row_carousel['imagemdomicilio']; ?>" class="d-block w-100 carousel-img" alt="">
                    <div class="carousel-caption d-none d-md-block">
                    <h3 class="text-bg-light"><?php echo $row_carousel['enderecodom']. ', ';  echo $row_carousel['numerodom'];?></h3>
                    <p class="lead">ALUGUEL(R$): <?php echo number_format($row_carousel['mensalidade'], 2, ',', '.'). ' | ';  ?>IPTU(R$): <?php echo number_format($row_carousel['iptu'], 2, ',','.'); ?></p>
                    <a href="<?= $BASE_URL?>domicilios.php?iddomicilio=<?php echo ($row_carousel['iddomicilio'])?>" class="btn card-btn2 btn-carousel">Conhecer</a>
                    </div>
                </div>
        <?php
        }
    }
    ?>
   </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

