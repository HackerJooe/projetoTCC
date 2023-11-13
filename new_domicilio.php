<?php 
    require_once("templates/header.php");
    require_once("dao/UsuarioDAO.php");
    require_once("models/usuario.php");

    $usuarios = new Usuarios();

    $usuarioDAO = new UsuarioDAO($conn, $BASE_URL);
    // VERIFICA SE TEM ALGUM USUARIO AUTENTICADO
    $usuarioData = $usuarioDAO->verifyToken(true);
?>
    <div id="main-container" class="container-fluid">
       <div class="offset-md-4 col-md-4 new-domicilio-container" id="add-domicilio-form">
        <h2>Adicionar Novo Domicílio</h2>
        <p class="page-description">Cadastre sua residência para divulgarmos para você!</p>
        <form action="<?= $BASE_URL ?>domicilio_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" id="type" value="create_domicilio">
            <input type="hidden" name="idusuario" value="<?= $usuarioData->idusuario?>">
            <div class="form-group">
                <label for="tipodomicilio">Tipo de Domícilio:</label>
                <input type="text" class="form-control" name="tipodomicilio" id="tipodomicilio" placeholder="Exemplo:(Germinada, Sobrado, etc...)">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Domícilio:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="5" placeholder="Casa Térrea, possue três quartos, dois banheiros, cozinha americana, garagem para um veículo, portão automático, etc..."></textarea>
            </div>
            <div class="form-group">
                <label for="imagemdomicilio">Foto Frente do Domicilio(CAPA):</label>
                <input type="file" class="form-control-file" name="imagemdomicilio" id="imagemdomicilio">
            </div>
            <div class="form-group">
                <!-- checkbox das caracteristicas possiveis dos domicilios -->
                <div class="row row-cols-3">
                    <label class="container"><strong>Características:</strong></label>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="garagem">
                            Garagem
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="aceita pets">
                            Aceita Pets
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="mobiliado">
                            Mobiliado
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="area de servico">
                            Área de Serviço
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="elevador">
                            Elevador
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="portaria 24h">
                            Portaria 24h
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="varanda">
                            Varanda
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="piscina">
                            Piscina
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]"  value="piscina privativa">
                            Piscina Priv.
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]"  value="academia">
                            Academia
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]"  value="ar condionado">
                            Ar-Condicionado
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="playground">
                            PlayGround
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="adap. para deficiente">
                            Adap. p/ Deficientes
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="sauna">
                            Sauna
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="churrasqueira">
                            Churrasqueira
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="quadra esportiva">
                            Quadra de Esportes
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="hospital proximo">
                            Hospitais Próximos
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="escola proxima">
                            Escolas Próximas
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="universidade proxima">
                            Universidades Próximas
                        </label>
                    </div>
                    <div class="form-check col-auto">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="caracteristicas[]" value="area de lazer proxima">
                            Áreas de Lazer Próximas
                        </label>
                    </div>
            </div>
            </div>
            <div class="form-group">
                    <label for="caracteristicasadc">Característica Adicional:</label>
                    <input type="text" class="form-control" name="caracteristicasadc" id="caracteristicasadc" maxlength="150" placeholder="Digite aqui a característica que não tem acima">
            </div>
            <div class="form-group">
                <label for="metragem">Metragem:</label>
                <input type="number" class="form-control" name="metragem" id="metragem" placeholder="45.2">
            </div>
            <hr>
            <h2>Dados de Endereço do Domicílio</h2>
            <div class="form-group">
                <label for="enderecodom">Endereco:</label>
                <input type="text" class="form-control" name="enderecodom" id="enderecodom" placeholder="Rua Blablabla">
            </div>
            <div class="form-group">
                <label for="numerodom">Numero:</label>
                <input type="number" class="form-control" name="numerodom" id="numerodom" placeholder="32">
            </div>
            <div class="form-group">
                <label for="complementodom">Complemento:</label>
                <input type="text" class="form-control" name="complementodom" id="complementodom" placeholder="A">
            </div>
            <div class="form-group">
                <label for="cepdom">CEP:</label>
                <input type="number" class="form-control" name="cepdom" id="cepdom" placeholder="12345678" maxlength="8" minlength="8">
            </div>
            <div class="form-group">
                <label for="cidadedom">Cidade:</label>
                <input type="text" class="form-control" name="cidadedom" id="cidadedom" placeholder="Exemplo:(Osasco)">
            </div>
            <div class="form-group">
                <label for="estadodom">Estado:</label>
                <select name="estadodom" id="estadodom" class="form-control">
                    <option value="">Selecione o Estado</option>
                    <option value="AC">Acre</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="AL">Alagoas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MA">Maranhão</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PR">Paraná</option>
                    <option value="PB">Paraíba</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mensalidade">Aluguel(R$):</label>
                <input type="text" class="form-control" name="mensalidade" id="mensalidade" placeholder="500,00">
            </div>
            <div class="form-group">
                <label for="iptu">IPTU(R$):</label>
                <input type="text" class="form-control" name="iptu" id="iptu" placeholder="100,00">
            </div>
            <div class="form-group-btn">
                <input type="submit" value="Adicionar Domicilio" class="btn form-btn card-btn">
            </div>


        
        </form>
       </div>
    </div>
   
    
<?php 
    require_once("templates/footer.php");

?>