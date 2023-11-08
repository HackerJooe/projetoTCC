<?php 
require_once("templates/header.php");

require_once("dao/DomicilioDAO.php");
require_once("models/domicilio.php");

$domicilioDao = new DomicilioDAO($conn, $BASE_URL);


$acDomicilio = $domicilioDao->getDomicilioByEstado("AC");
$alDomicilio = $domicilioDao->getDomicilioByEstado("AL");
$apDomicilio = $domicilioDao->getDomicilioByEstado("AP");
$amDomicilio = $domicilioDao->getDomicilioByEstado("AM");
$baDomicilio = $domicilioDao->getDomicilioByEstado("BA");
$ceDomicilio = $domicilioDao->getDomicilioByEstado("CE");
$esDomicilio = $domicilioDao->getDomicilioByEstado("ES");
$goDomicilio = $domicilioDao->getDomicilioByEstado("GO");
$maDomicilio = $domicilioDao->getDomicilioByEstado("MA");
$mtDomicilio = $domicilioDao->getDomicilioByEstado("MT");
$msDomicilio = $domicilioDao->getDomicilioByEstado("MS");
$mgDomicilio = $domicilioDao->getDomicilioByEstado("MG");
$paDomicilio = $domicilioDao->getDomicilioByEstado("PA");
$pbDomicilio = $domicilioDao->getDomicilioByEstado("PB");
$prDomicilio = $domicilioDao->getDomicilioByEstado("PR");
$peDomicilio = $domicilioDao->getDomicilioByEstado("PE");
$piDomicilio = $domicilioDao->getDomicilioByEstado("PI");
$rjDomicilio = $domicilioDao->getDomicilioByEstado("RJ");
$rnDomicilio = $domicilioDao->getDomicilioByEstado("RN");
$rsDomicilio = $domicilioDao->getDomicilioByEstado("RS");
$roDomicilio = $domicilioDao->getDomicilioByEstado("RO");
$rrDomicilio = $domicilioDao->getDomicilioByEstado("RR");
$scDomicilio = $domicilioDao->getDomicilioByEstado("SC");
$spDomicilio = $domicilioDao->getDomicilioByEstado("SP");
$seDomicilio = $domicilioDao->getDomicilioByEstado("SE");
$toDomicilio = $domicilioDao->getDomicilioByEstado("TO");

?>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="<?= $BASE_URL?>css/style_index.css">
<link rel="stylesheet" href="<?= $BASE_URL?>css/style_index2.css">
</head>
</html>
<div class="accordion" id="accordionPanelsStayOpenExample">
    <!-- 1# ACRE -->
    <?php if(!empty($acDomicilio)): ?>
        <div class="accordion-item" id="acre">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    ACRE &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ac.png" alt="Acre">&nbsp; Residências Cadastradas: (<?= count($acDomicilio) ?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($acDomicilio as $domicilio):  ?>

                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item" id="acre">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    ACRE &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ac.png" alt="Acre">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <h6>Não possuímos cadastros de Domicilios no Estado do Acre.</h6>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- 2# ALAGOAS -->
    <?php if(!empty($alDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDois" aria-expanded="true" aria-controls="panelsStayOpen-collapseDois">
                    ALAGOAS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_al.png" alt="Alagoas">&nbsp; Residências Cadastradas: (<?= count($alDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDois" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($alDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDois" aria-expanded="false" aria-controls="panelsStayOpen-collapseDois">
                    ALAGOAS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_al.png" alt="Alagoas">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
            <div id="panelsStayOpen-collapseDois" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <h6>Não possuímos cadastros de Domicilios no Estado do Alagoas.</h6>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- 3# AMAPÁ -->
    <?php if(!empty($apDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTres" aria-expanded="true" aria-controls="panelsStayOpen-collapseTres">
                    AMAPÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ap.png" alt="Amapá">&nbsp; Residências Cadastradas: (<?= count($apDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseTres" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($apDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTres" aria-expanded="true" aria-controls="panelsStayOpen-collapseTres">
                    AMAPÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ap.png" alt="Amapá">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
            <div id="panelsStayOpen-collapseTres" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <h6>Não possuímos cadastros de Domicilios no Estado do Amapá.</h6>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- 4# AMAZONAS -->
    <?php if(!empty($amDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuatro" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuatro">
                    AMAZONAS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_am.png" alt="Amazonas"> Residências Cadastradas: (<?= count($amDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseQuatro" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($amDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuatro" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuatro">
                    AMAZONAS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_am.png" alt="Amazonas">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseQuatro" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Amazonas.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 5# BAHIA -->
    <?php if(!empty($baDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseCinco" aria-expanded="true" aria-controls="panelsStayOpen-collapseCinco">
                    BAHIA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ba.png" alt="Bahia">&nbsp; Residências Cadastradas: (<?= count($baDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseCinco" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($baDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseCinco" aria-expanded="true" aria-controls="panelsStayOpen-collapseCinco">
                    BAHIA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ba.png" alt="Bahia">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseCinco" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Bahia.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 6# CEARÁ -->
    <?php if(!empty($ceDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeis" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeis">
                    CEARÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ce.png" alt="Ceará">&nbsp; Residências Cadastradas: (<?= count($ceDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseSeis" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($ceDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeis" aria-expanded="true" aria-controls="panelsStayOpen-collapseSeis">
                    CEARÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ce.png" alt="Ceará">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseSeis" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Ceará.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 7# ESPIRITO SANTO -->
    <?php if(!empty($esDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSete" aria-expanded="true" aria-controls="panelsStayOpen-collapseSete">
                    ESPIRITO SANTO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_es.png" alt="Espirito Santo">&nbsp; Residências Cadastradas: (<?= count($esDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseSete" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($esDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSete" aria-expanded="true" aria-controls="panelsStayOpen-collapseSete">
                    ESPIRITO SANTO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_es.png" alt="Espirito Santo">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseSete" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Espirito Santo.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 8# GOIÁS -->
    <?php if(!empty($goDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOito" aria-expanded="true" aria-controls="panelsStayOpen-collapseOito">
                    GOIÁS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_go.png" alt="Goiás">&nbsp; Residências Cadastradas: (<?= count($goDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOito" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($goDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOito" aria-expanded="true" aria-controls="panelsStayOpen-collapseOito">
                    GOIÁS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_go.png" alt="Goiás">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOito" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Ceará.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 9# MARANHÃO -->
    <?php if(!empty($maDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNove" aria-expanded="true" aria-controls="panelsStayOpen-collapseNove">
                    MARANHÃO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ma.png" alt="Maranhão">&nbsp; Residências Cadastradas: (<?= count($maDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseNove" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($maDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNove" aria-expanded="true" aria-controls="panelsStayOpen-collapseNove">
                    MARANHÃO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ma.png" alt="Maranhão">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseNove" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Maranhão.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 10# MATO GROSSO -->
    <?php if(!empty($mtDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDez" aria-expanded="true" aria-controls="panelsStayOpen-collapseDez">
                    MATO GROSSO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_mt.png" alt="Mato Grosso">&nbsp; Residências Cadastradas: (<?= count($mtDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDez" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($mtDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDez" aria-expanded="true" aria-controls="panelsStayOpen-collapseDez">
                    MATO GROSSO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_mt.png" alt="Mato Grosso">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDez" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Mato Grosso.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 11# MATO GROSSO DO SUL -->
    <?php if(!empty($msDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOnze" aria-expanded="true" aria-controls="panelsStayOpen-collapseOnze">
                    MATO GROSSO DO SUL &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ms.png" alt="Mato Grosso do Sul">&nbsp; Residências Cadastradas: (<?= count($msDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOnze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($msDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOnze" aria-expanded="true" aria-controls="panelsStayOpen-collapseOnze">
                    MATO GROSSO DO SUL &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ms.png" alt="Mato Grosso do Sul">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOnze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Mato Grosso do Sul.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 12# MINAS GERAIS -->
    <?php if(!empty($mgDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDoze" aria-expanded="true" aria-controls="panelsStayOpen-collapseDoze">
                    MINAS GERAIS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_mg.png" alt="Minas Gerais">&nbsp; Residências Cadastradas: (<?= count($mgDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDoze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($mgDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDoze" aria-expanded="true" aria-controls="panelsStayOpen-collapseDoze">
                    MINAS GERAIS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ce.png" alt="Minas Gerais">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDoze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Minas Gerais.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 13# PARÁ -->
    <?php if(!empty($paDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTreze" aria-expanded="true" aria-controls="panelsStayOpen-collapseTreze">
                    PARÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pa.png" alt="Pará">&nbsp; Residências Cadastradas: (<?= count($paDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseTreze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($ceDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTreze" aria-expanded="true" aria-controls="panelsStayOpen-collapseTreze">
                    PARÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pa.png" alt="Pará">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseTreze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Pará.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 14# PARAÍBA -->
    <?php if(!empty($pbDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuatorze" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuatorze">
                    PARAÍBA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pb.png" alt="Paraíba">&nbsp; Residências Cadastradas: (<?= count($pbDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseQuatorze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($pbDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuatorze" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuatorze">
                    PARAÍBA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pb.png" alt="Paraíba">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseQuatorze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Paraíba.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 15# PARANÁ -->
    <?php if(!empty($prDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuinze" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuinze">
                    PARANÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pr.png" alt="Paraná">&nbsp; Residências Cadastradas: (<?= count($prDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseQuinze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($prDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseQuinze" aria-expanded="true" aria-controls="panelsStayOpen-collapseQuinze">
                    PARANÁ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pr.png" alt="Paraná">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseQuinze" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Paraná.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 16# PERNAMBUCO -->
    <?php if(!empty($peDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezesseis" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezesseis">
                    PERNAMBUCO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pe.png" alt="Pernambuco">&nbsp; Residências Cadastradas: (<?= count($peDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezesseis" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($peDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezesseis" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezesseis">
                    PERNAMBUCO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pe.png" alt="Pernambuco">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezesseis" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Paraná.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 17# PIAUÍ -->
    <?php if(!empty($piDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezessete" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezessete">
                    PIAUÍ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pi.png" alt="Piauí">&nbsp; Residências Cadastradas: (<?= count($piDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezessete" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php foreach($piDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezessete" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezessete">
                    PIAUÍ &nbsp; <img class="bandeiras" src="./img/estados/bandeira_pi.png" alt="Piauí">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezessete" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Piauí.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 18# RIO DE JANEIRO -->
    <?php if(!empty($rjDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezoito" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezoito">
                    RIO DE JANEIRO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rj.png" alt="Rio de Janeiro">&nbsp; Residências Cadastradas: (<?= count($rjDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezoito" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($rjDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezoito" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezoito">
                    RIO DE JANEIRO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rj.png" alt="Rio de Janeiro">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezoito" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Rio de Janeiro.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 19# RIO GRANDE DO NORTE -->
    <?php if(!empty($rnDomicilio)): ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezenove" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezenove">
                    RIO GRANDE DO NORTE &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rn.png" alt="Rio Grande do Norte">&nbsp; Residências Cadastradas: (<?= count($rnDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezenove" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($rnDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseDezenove" aria-expanded="true" aria-controls="panelsStayOpen-collapseDezenove">
                    RIO GRANDE DO NORTE &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rn.png" alt="Rio Grande do Norte">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseDezenove" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Rio Grande do Norte.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 20# RIO GRANDE DO SUL -->
    <?php if(!empty($rsDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinte" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinte">
                    RIO GRANDE DO SUL &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rs.png" alt="Rio Grande do Sul">&nbsp; Residências Cadastradas: (<?= count($rsDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinte" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($rsDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinte" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinte">
                    RIO GRANDE DO SUL &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rs.png" alt="Rio Grande do Sul">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinte" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Rio Grande do Sul.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 21# RONDÔNIA -->
    <?php if(!empty($roDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteUm" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteUm">
                    RONDÔNIA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ro.png" alt="Rondônia">&nbsp; Residências Cadastradas: (<?= count($roDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteUm" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($roDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteUm" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteUm">
                    RONDÔNIA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_ro.png" alt="Rondônia">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteUm" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Rondônia.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 22# RORAIMA -->
    <?php if(!empty($rrDomicilio)): ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteDois" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteDois">
                    RORAIMA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rr.png" alt="Roraima">&nbsp; Residências Cadastradas: (<?= count($rrDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteDois" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($rrDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    <?php else: ?>
        <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteDois" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteDois">
                    RORAIMA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_rr.png" alt="Roraima">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteDois" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Roraima.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 23# SANTA CATARINA -->
    <?php if(!empty($scDomicilio)): ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteTres" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteTres">
                    SANTA CATARINA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_sc.png" alt="Santa Catarina">&nbsp; Residências Cadastradas: (<?= count($scDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteTres" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($scDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    <?php else: ?>
           <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteTres" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteTres">
                    SANTA CATARINA &nbsp; <img class="bandeiras" src="./img/estados/bandeira_sc.png" alt="Santa Catarina">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteTres" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Santa Catarina.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 24# SÃO PAULO -->
    <?php if(!empty($spDomicilio)): ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteQuatro" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteQuatro">
                    SÃO PAULO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_sp.png" alt="São Paulo">&nbsp; Residências Cadastradas: (<?= count($spDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteQuatro" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($spDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    <?php else: ?>
           <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteQuatro" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteQuatro">
                    SÃO PAULO &nbsp; <img class="bandeiras" src="./img/estados/bandeira_sp.png" alt="São Paulo">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteQuatro" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do São Paulo.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 25# SERGIPE -->
    <?php if(!empty($seDomicilio)): ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteCinco" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteCinco">
                    SERGIPE &nbsp; <img class="bandeiras" src="./img/estados/bandeira_se.png" alt="Sergipe">&nbsp; Residências Cadastradas: (<?= count($seDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteCinco" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($seDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    <?php else: ?>
           <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteCinco" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteCinco">
                    SERGIPE &nbsp; <img class="bandeiras" src="./img/estados/bandeira_se.png" alt="Sergipe">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteCinco" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Sergipe.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    <!-- 26# TOCANTINS -->
    <?php if(!empty($toDomicilio)): ?>
            <div class="accordion-item" id="tocantins">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteSeis" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteSeis">
                    TOCANTINS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_to.png" alt="Tocantins">&nbsp; Residências Cadastradas: (<?= count($toDomicilio)?>)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteSeis" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <?php foreach($toDomicilio as $domicilio):  ?>
                                <?php require("templates/domicilio_card.php"); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    <?php else: ?>
           <div class="accordion-item" id="tocantins">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseVinteSeis" aria-expanded="true" aria-controls="panelsStayOpen-collapseVinteSeis">
                    TOCANTINS &nbsp; <img class="bandeiras" src="./img/estados/bandeira_to.png" alt="Tocantins">&nbsp; Residências Cadastradas: (0)
                </button>
                </h2>
                <div id="panelsStayOpen-collapseVinteSeis" class="accordion-collapse collapse ">
                    <div class="accordion-body">
                        <h6>Não possuímos cadastros de Domicilios no Estado do Tocantins.</h6>
                    </div>
                </div>
        </div>
    <?php endif; ?>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
