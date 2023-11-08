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