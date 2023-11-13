<?php 
    require_once("templates/header.php");

?>
    <div id="main-container" class="container-fluid">
        <div class="col-md-12">
            <div class="row" id="auth-row">
                <div class="col-md-4" id="login-container">
                    <form action="<?= $BASE_URL ?>autentic_process.php" method="POST">
                        <h2>Entrar</h2>
                        <input type="hidden" name="type" value="login">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu Email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                        </div>
                        <input type="submit" class="btn card-btn" value="Entrar"> 
                    </form>
                </div>
                <div class="col-md-4" id="registros-container">
                    <form action="<?= $BASE_URL ?>autentic_process.php" method="POST">
                        <h2>Criar Conta</h2>
                        <input type="hidden" name="type" value="registro">
                        <div class="card-group2">
                        <label for="tipousuario">Tipo de Usuário:</label>
                        <p>Selecionar um dos campos!</p> 
                            <input type="radio" name="tipousuario" id="locador" value="1">
                            <label for="locador">Locador</label>
                            &nbsp;
                            <input type="radio" name="tipousuario" id="locatario" value="2">
                            <label for="locatario">Locatario</label>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu Email">
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite seu Primeiro Nome">
                        </div>
                        <div class="form-group">
                            <label for="sobrenome">Sobrenome:</label>
                            <input type="text" class="form-control" name="sobrenome" placeholder="Digite seu Sobrenome">
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="dddnumerowhatsapp">DDD Estado:</label>
                                </div>
                                <select class="custom-select" name="dddnumerowhatsapp" id="dddnumerowhatsapp">
                                    <option selected>Escolha o DDD correspondente ao seu numero de whatsapp!</option>
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
                            
                            <label for="numerowhatsapp">Número(Whatsapp):</label>
                            <input type="number" class="form-control" name="numerowhatsapp" min-lenght="9" max-lenght="9" placeholder="Digite seu Sobrenome">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                        </div>
                        <div class="form-group">
                            <label for="corfirmasenha">Confirmação da Senha:</label>
                            <input type="password" class="form-control" name="confirmasenha" placeholder="Confirme a sua senha">
                        </div>
                        <input type="submit" class="btn card-btn" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    require_once("templates/footer.php");

?>