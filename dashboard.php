<?php 
    require_once("templates/header.php");
    require_once("dao/UsuarioDAO.php");
    require_once("models/usuario.php");
    require_once("dao/DomicilioDAO.php");

    $usuarios = new Usuarios();

    $usuarioDAO = new UsuarioDAO($conn, $BASE_URL);
    $domicilioDAO = new DomicilioDAO($conn, $BASE_URL);
    // VERIFICA SE TEM ALGUM USUARIO AUTENTICADO
    $usuarioData = $usuarioDAO->verifyToken(true);

    $domiciliosUsuario = $domicilioDAO->getDomicilioByUsuario($usuarioData->idusuario);

    // print_r($domiciliosUsuario); 
?>
        <p class="subtitulo-titulo bold">Organizando sua vida e seu bolso!!!</p>
        
               
                    
        

    <div id="main-container" class="container-fluid">
        <h2 class="section-titulo">DASHBOARD DOMÍCILIOS</h2>
        <strong class="info_dash">Edite ou Atualize as informações dos seus domícilios cadastrados!</strong>
        <div class="col-md-12" id="add-domicilio-container">
            <a href="<?= $BASE_URL ?>new_domicilio.php" class="btn card-btn">
                <i class="fas fa-plus"> &nbsp;Novo Domicilio</i>
            </a>
        </div>
        <div class="col-md-12" id="domicilios-dashboard">
            <table class="table">
                <thead>
                    <th scope="col">Id:</th>
                    <th scope="col" class="tipo-column">Tipo Residência:</th>
                    <th scope="col" class="desc-column">Descrição Proprietário:</th>
                    <th scope="col" class="car-column">Caracteristicas:</th>
                    <th scope="col">Caracter... Adicionais:</th>
                    <th scope="col">Endereço:</th>
                    <th scope="col">N°:</th>
                    <th scope="col">Comp.:</th>
                    <th scope="col">CEP:</th>
                    <th scope="col">Cidade:</th>
                    <th scope="col">Estado:</th>
                    <th scope="col">M²:</th>
                    <th scope="col">Aluguel(R$):</th>
                    <th scope="col">IPTU(R$):</th>
                    <th scope="col" class="action-column">AÇÕES</th>
                </thead>
                <tbody>
                    <?php foreach($domiciliosUsuario as $domicilio): ?>
                    <tr>
                        <td><a href="<?= $BASE_URL?>domicilios.php?iddomicilio=<?= $domicilio->iddomicilio?>" class=""><?=$domicilio->iddomicilio ?> </a></td>
                        <td><p class="table-domicilio-tipodom"><?= $domicilio->tipodomicilio?></p></td>
                        <td><p class="table-domicilio-descricao"><?= $domicilio->descricao ?></p></td>
                        <td><p class="table-domicilio-caracteristicas"> <?= $domicilio->caracteristicas ?></p></td>
                        <td><p class="table-domicilio-caracteristicasadc"><?= $domicilio->caracteristicasadc ?></p></td>
                        <td><p class="table-domicilio-endereco"><?= $domicilio->enderecodom ?></p></td>
                        <td><p class="table-domicilio-numero text-center"><?= $domicilio->numerodom ?></p></td>
                        <td><p class="table-domicilio-complemento text-center"><?= $domicilio->complementodom ?></p></td>
                        <td><p class="table-domicilio-cep"><?= $domicilio->cepdom ?></p></td>
                        <td><p class="table-domicilio-cidade text-center"><?= $domicilio->cidadedom?></p></td>
                        <td><p class="table-domicilio-estado text-center"><?= $domicilio->estadodom ?></p></td>
                        <td><p class="table-domicilio-metragem bold"><?= number_format($domicilio->metragem, 2, ".", ",") ?></p></td>
                        <td><p class="table-domicilio-mensalidade text-center"><?= number_format($domicilio->mensalidade, 2, ",", ".") ?></p></td>
                        <td><p class="table-domicilio-iptu text-center"><?= number_format($domicilio->iptu, 2, ",", ".") ?></p></td>
                        <td class="action-column">
                            <a href="<?= $BASE_URL?>domicilioEdit.php?iddomicilio=<?= $domicilio->iddomicilio?>" class="table-domicilio-action">
                                <i class="far fa-edit edit-btn"> &nbsp;Editar</i>
                            </a>
                            <form action="<?= $BASE_URL?>domicilio_process.php">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="iddomicilio" value="<?=$domicilio->iddomicilio ?>">
                                <a href="">
                                    <i class="fas fa-times delete-btn"> &nbsp;Deletar</i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php 
    require_once("templates/footer.php");

?>