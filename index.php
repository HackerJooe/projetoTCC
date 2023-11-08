<?php 
    require_once("templates/header.php");

    require_once("dao/DomicilioDAO.php");
    require_once("models/domicilio.php");

    $domicilioDao = new DomicilioDAO($conn, $BASE_URL);
    
    $lastestDomicilio = $domicilioDao->getLatestDomicilios();
    // print_r($lastestDomicilio);

    // 1#
    $acDomicilio = $domicilioDao->getDomicilioByEstado("AC");
    // 2#
    $alDomicilio = $domicilioDao->getDomicilioByEstado("AL");
    // 3#
    $apDomicilio = $domicilioDao->getDomicilioByEstado("AP");
    // 4#
    $amDomicilio = $domicilioDao->getDomicilioByEstado("AM");
    // 5#
    $baDomicilio = $domicilioDao->getDomicilioByEstado("BA");
    // 6#
    $ceDomicilio = $domicilioDao->getDomicilioByEstado("CE");
    // 7#
    $esDomicilio = $domicilioDao->getDomicilioByEstado("ES");
    // 8#
    $goDomicilio = $domicilioDao->getDomicilioByEstado("GO");
    // 9#
    $maDomicilio = $domicilioDao->getDomicilioByEstado("MA");
    // 10#
    $mtDomicilio = $domicilioDao->getDomicilioByEstado("MT");
    // 11#
    $msDomicilio = $domicilioDao->getDomicilioByEstado("MS");
    // 12#
    $mgDomicilio = $domicilioDao->getDomicilioByEstado("MG");
    // 13#
    $paDomicilio = $domicilioDao->getDomicilioByEstado("PA");
    // 14#
    $pbDomicilio = $domicilioDao->getDomicilioByEstado("PB");
    // 15#
    $prDomicilio = $domicilioDao->getDomicilioByEstado("PR");
    // 16#
    $peDomicilio = $domicilioDao->getDomicilioByEstado("PE");
    // 17#
    $piDomicilio = $domicilioDao->getDomicilioByEstado("PI");
    // 18#
    $rjDomicilio = $domicilioDao->getDomicilioByEstado("RJ");
    // 19#
    $rnDomicilio = $domicilioDao->getDomicilioByEstado("RN");
    // 20#
    $rsDomicilio = $domicilioDao->getDomicilioByEstado("RS");
    // 21#
    $roDomicilio = $domicilioDao->getDomicilioByEstado("RO");
    // 22#
    $rrDomicilio = $domicilioDao->getDomicilioByEstado("RR");
    // 23#
    $scDomicilio = $domicilioDao->getDomicilioByEstado("SC");
    // 24#
    $spDomicilio = $domicilioDao->getDomicilioByEstado("SP");
    // 25#
    $seDomicilio = $domicilioDao->getDomicilioByEstado("SE");
    // 26#
    $toDomicilio = $domicilioDao->getDomicilioByEstado("TO");


?>
<!DOCTYPE html>
        <p class="subtitulo-titulo bold">Encontre o Lar para Seguir os seus Sonhos!!!</p>
        <div class="container-carousel">
            <div class="gallery-wrapper">
                    <h2 class="section-titulo">NOVIDADES</h2>
                    <?php 
                        include_once("templates/carrosel.php");
                    ?>
                
            </div>
        </div>
        

    <div id="main-container" class="container-fluid">
        <h2 class="section-titulo">ULTIMOS ADICIONADOS</h2>
        <!-- ULTIMOS ADICIONADOS DECRESCENTE -->
        <div class="row">
                <?php foreach($lastestDomicilio as $domicilio): ?>
                    <?php require("templates/domicilio_card.php"); ?>
                <?php endforeach; ?>
                <?php if(count($lastestDomicilio) === 0): ?>
                    <p class="empty-list">Ainda não há domícilios cadastrados.</p>
                <?php endif; ?>
        </div>

        <?php 
            require("./templates/domicilio_est_card.php");
        ?>   
    </div>

<?php 
    require_once("templates/footer.php");

?>