<?php 
    require_once("templates/header.php");
    require_once("dao/UsuarioDAO.php");
    require_once("models/usuario.php");

    $usuarios = new Usuarios();

    $usuarioDAO = new UsuarioDAO($conn, $BASE_URL);

    $usuarioData = $usuarioDAO->verifyToken(true);

    $nomeCompleto = $usuarios->pegarNomeCompleto($usuarioData);
    if(empty($nomeCompleto)) {
        $message->inseriMessagem("Faça seu login para entrar nesta página", "error", "index.php");
    }
    if($usuarioData->imagem == "") {
        $usuarioData->imagem = "usuario.png";
    }
    

?>
    <div id="main-container" class="container-fluid edit-profile-page">
        <div class="col-md-12">
            <form action="<?= $BASE_URL ?>usuarios_process.php" method="POST" class="form" enctype="multipart/form-data">
                <input type="hidden" name="type" value="update">
                <div class="row">
                    <div class="col-md-4">
                        <h1><?= $nomeCompleto ?></h1>
                        <p class="page-description">Altere seus dados no formulário abaixo:</p>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o seu Nome" value="<?= $usuarioData->nome ?>">
                        </div>
                        <div class="form-group">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite o seu Sobrenome" value="<?= $usuarioData->sobrenome ?>">
                        </div>
                        <div class="form-group">
                            <label for="bio">Biografia:</label>
                            <textarea class="form-control" name="bio" id="bio" rows="5" placeholder="Conte-nos sobre você, o que faz, onde trabalha/estuda, o que deseja alcançar para o futuro..."><?= $usuarioData->bio ?></textarea>
                        </div>
                        <div class="form-group">
                                <div class="input-group mb-3">
                                    <label for="">DDD Whatsapp: </label> &nbsp;&nbsp;&nbsp;
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="dddnumerowhatsapp">DDD Estado:</label>
                                        </div>
                                        <select class="custom-select" name="dddnumerowhatsapp" id="dddnumerowhatsapp">
                                            <option selected><?= $usuarioData->dddnumerowhatsapp ?></option>
                                            <option style="font-weight: bold;" disabled>CENTRO OESTE</option>
                                            <option value="61">(61)DISTRITO FEDERAL</option>
                                            <option value="62">(62)Goiás</option>
                                            <option value="64">(64)Goiás</option>
                                            <option value="65">(65)Mato Grosso</option>
                                            <option value="66">(66)Mato Grosso</option>
                                            <option value="67">(67)Mato Grosso do Sul</option>
                                            <option style="font-weight: bold;" disabled>NORDESTE</option>
                                            <option value="82">(82)Alagoas</option>
                                            <option value="71">(71)Bahia</option>
                                            <option value="73">(73)Bahia</option>
                                            <option value="74">(74)Bahia</option>
                                            <option value="75">(75)Bahia</option>
                                            <option value="77">(77)Bahia</option>
                                            <option value="85">(85)Ceará</option>
                                            <option value="88">(88)Ceará</option>
                                            <option value="98">(98)Maranhão</option>
                                            <option value="99">(99)Maranhão</option>
                                            <option value="83">(83)Paraíba</option>
                                            <option value="81">(81)Pernambuco</option>
                                            <option value="87">(87)Pernambuco</option>
                                            <option value="86">(86)Piauí</option>
                                            <option value="89">(89)Piauí</option>
                                            <option value="84">(84)Rio Grande do Norte</option>
                                            <option value="79">(79)Sergipe</option>
                                            <option style="font-weight: bold;" disabled>NORTE</option>
                                            <option value="68">(68)Acre</option>
                                            <option value="96">(96)Amapá</option>
                                            <option value="92">(92)Amazonas</option>
                                            <option value="97">(97)Amazonas</option>
                                            <option value="91">(91)Pará</option>
                                            <option value="93">(93)Pará</option>
                                            <option value="94">(94)Pará</option>
                                            <option value="69">(69)Rondônia</option>
                                            <option value="95">(95)Roraima</option>
                                            <option value="63">(63)Tocantins</option>
                                            <option style="font-weight: bold;" disabled>SUDESTE</option>
                                            <option value="27">(27)Espírito Santo</option>
                                            <option value="28">(28)Espírito Santo</option>
                                            <option value="31">(31)Minas Gerais</option>
                                            <option value="32">(32)Minas Gerais</option>
                                            <option value="33">(33)Minas Gerais</option>
                                            <option value="34">(34)Minas Gerais</option>
                                            <option value="35">(35)Minas Gerais</option>
                                            <option value="37">(37)Minas Gerais</option>
                                            <option value="38">(38)Minas Gerais</option>
                                            <option value="21">(21)Rio de Janeiro</option>
                                            <option value="22">(22)Rio de Janeiro</option>
                                            <option value="24">(24)Rio de Janeiro</option>
                                            <option value="11">(11)São Paulo</option>
                                            <option value="12">(12)São Paulo</option>
                                            <option value="13">(13)São Paulo</option>
                                            <option value="14">(14)São Paulo</option>
                                            <option value="15">(15)São Paulo</option>
                                            <option value="16">(16)São Paulo</option>
                                            <option value="17">(17)São Paulo</option>
                                            <option value="18">(18)São Paulo</option>
                                            <option value="19">(19)São Paulo</option>
                                            <option style="font-weight: bold;" disabled>SUL</option>
                                            <option value="41">(41)Paraná</option>
                                            <option value="42">(42)Paraná</option>
                                            <option value="43">(43)Paraná</option>
                                            <option value="44">(44)Paraná</option>
                                            <option value="45">(45)Paraná</option>
                                            <option value="46">(46)Paraná</option>
                                            <option value="51">(51)Rio Grande do Sul</option>
                                            <option value="53">(53)Rio Grande do Sul</option>
                                            <option value="54">(54)Rio Grande do Sul</option>
                                            <option value="55">(55)Rio Grande do Sul</option>
                                            <option value="47">(47)Santa Catarina</option>
                                            <option value="48">(48)Santa Catarina</option>
                                            <option value="49">(49)Santa Catarina</option>
                                        </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="">Numero Whatsapp:</label>
                            <input type="tel" class="form-control" id="numerowhatsapp" minlength="9" name="numerowhatsapp" value="<?= $usuarioData->numerowhatsapp ?>">

                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" readonly class="form-control " id="email" name="email" placeholder="Digite o seu Email" value="<?= $usuarioData->email ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <h2>Adicionar Imagem de Perfil:</h2>
                        <p>Adicione uma foto sua ao seu perfil para maior confiabilidade.</p>
                            <div id="profile-image-container" style="background-image: url('<?= $BASE_URL ?>img/usuarios/<?= $usuarioData->imagem?>');">
                            </div>
                            <div class="form-group">
                                <label for="imagem" class="labelImagem">Foto:</label>
                                <input type="file" class="form-control-file" name="imagem"  value="<?= $usuarioData->imagem?>">
                            </div>
                    </div>
                    <input type="submit" value="Alterar Dados" class="btn form-btn card-btn">
            </form>
            <div class="col-md-4 form-alterar-senha">
                        <h2>Alterar a senha:</h2>
                        <p class="page-description">Digite a nova senha e confirme, para alterar sua senha:</p>
                        <form action="<?= $BASE_URL ?>usuarios_process.php" method="POST" class="form">
                            <input type="hidden" name="type" value="alteraSenha">
                            <input type="hidden" name="idusuario" value="<?= $usuarioData->idusuario?>">
                            <div class="form-group">
                                    <label for="senha">Nova Senha:</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua nova senha" >
                            </div>
                            <div class="form-group">
                                    <label for="confirmasenha">Confirmação Nova Senha:</label>
                                    <input type="password" class="form-control" id="confirmasenha" name="confirmasenha" placeholder="Digite a sua nova senha" >
                            </div>
                            <input type="submit" value="Alterar Senha" class="btn card-btn">
                        </form>
            </div>
            <div class="col-md-4">
                <form action="<?= $BASE_URL ?>usuarios_process.php" method="POST" class="form">
                    <input type="hidden" name="type" value="updateEndereco">
                    <input type="hidden" name="idusuario" value="<?= $usuarioData->idusuario?>">
                    <h2>Dados de Endereço do Usuário</h2>
                        <div class="form-group">
                            <label for="endereco">Endereco:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua Blablabla">
                        </div>
                        <div class="form-group">
                            <label for="numero">Numero:</label>
                            <input type="number" class="form-control" name="numero" id="numero" placeholder="32">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" placeholder="A">
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="number" class="form-control" name="cep" id="cep" placeholder="12345678" maxlength="8" minlength="8">
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Exemplo:(Osasco)">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <select name="estado" id="estado" class="form-control">
                                <option selected>Selecione o Estado</option>
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
                        
                        <div class="form-group-btn">
                            <input type="submit" value="Cadastrar Endereço Usuário" class="btn form-btn card-btn">
                        </div>
                </form>
            </div>
      
        </div>
    </div>
    
<?php 
    require_once("templates/footer.php");

?>