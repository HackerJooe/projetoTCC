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

    
?>
        <p class="subtitulo-titulo bold">Organizando sua vida e seu bolso!!!</p>
        
               
                    
        

    <div id="main-container" class="container-fluid">
        <h2 class="section-titulo">DASHBOARD DOMÍCILIOS</h2>
        <strong class="info_dash">Edite ou Atualize as informações dos seus domícilios cadastrados!</strong>
        <div class="col-md-12" id="add-domicilio-container2">
            <a href="<?= $BASE_URL ?>new_domicilio.php" class="btn card-btn">
                <i class="fas fa-plus"> &nbsp;Novo Domicilio</i>
            </a>
        </div>
        <div class="col-md-12" id="domicilios-dashboard">
            <div class="box-select">
                <select name="selector" id="selector">
                <option>Selecione o domícilio</option>
                <?php foreach($domiciliosUsuario as $domicilio): ?>
                    <option value="<?= $domicilio->iddomicilio ?>" onclick="mostrar(<?= $domicilio->iddomicilio ?>)"><?= $domicilio->iddomicilio ?> - <?= $domicilio->enderecodom ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div id="pai">
                
                <?php foreach($domiciliosUsuario as $domicilio): ?>
                    <div id="<?= $domicilio->iddomicilio ?>" class="child">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= $BASE_URL?>domicilios.php?iddomicilio=<?= $domicilio->iddomicilio?>" class="btn-a-link" style="text-decoration: none;"><?=$domicilio->iddomicilio ?></a>
                                <h2><?= $domicilio->enderecodom ?>, N°<?= $domicilio->numerodom ?>, Comp.:<?= $domicilio->complementodom ?>, CEP: <?= $domicilio->cepdom ?> </h2>
                            </div>
                            <hr>
                            <div class="group-dados">
                                <tr><b>Tipo Domicilio:</b></tr>
                                <td><p ><?= $domicilio->tipodomicilio?></p></td>
                                <tr><b>Descrição Domicilio:</b></tr>
                                <td><p ><?= $domicilio->descricao ?></p></td>
                                <tr><b>Caracteristicas Domicilio:</b></tr>
                                <td><p><?= $domicilio->caracteristicas ?></p></td>
                                <tr><b>Caracteristicas Adicionais:</b></tr>
                                <td><p ><?= $domicilio->caracteristicasadc ?></p></td>
                                <tr><b>Endereço Domicilio:</b></tr>
                                <td><p><?= $domicilio->enderecodom ?></p></td>
                                <tr><b>Numero Domicilio:</b></tr>
                                <td><p><?= $domicilio->numerodom ?></p></td>
                                <tr><b>Complemento Domicilio:</b></tr>
                                <td><p><?= $domicilio->complementodom ?></p></td>
                                <tr><b>CEP Domicilio:</b></tr>
                                <td><p><?= $domicilio->cepdom ?></p></td>
                                <tr><b>Cidade Domicilio:</b></tr>
                                <td><p><?= $domicilio->cidadedom ?></p></td>
                                <tr><b>Estado Domicilio:</b></tr>
                                <td><p><?= $domicilio->estadodom ?></p></td>
                                <tr><b>Aluguel Domicilio:</b></tr>
                                <td><p><?= $domicilio->mensalidade ?></p></td>
                                <tr><b>IPTU Domicilio:</b></tr>
                                <td><p><?= $domicilio->iptu ?></p></td>
                            </div>
                            <div class="form-group">
                                <a href="<?= $BASE_URL?>domicilioEdit.php?iddomicilio=<?= $domicilio->iddomicilio?>" class="table-domicilio-action">
                                    <i class="far fa-edit edit-btn"> &nbsp;Editar</i>
                                </a>
                                <form action="<?= $BASE_URL?>domicilio_process.php">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="iddomicilio" value="<?=$domicilio->iddomicilio ?>">
                                    <a href="" class="table-domicilio-delete">
                                        <i class="fas fa-times delete-btn"> &nbsp;Deletar</i>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
<!--                 
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
                    
                </tbody>
            </table> -->
        </div>
    </div>

<?php 
    require_once("templates/footer.php");

?>
<script src="<?= $BASE_URL ?>js/dashboard.js"></script>