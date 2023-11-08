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
                            <label for="email">Email:</label>
                            <input type="email" readonly class="form-control " id="email" name="email" placeholder="Digite o seu Email" value="<?= $usuarioData->email ?>">
                        </div>
                        <input type="submit" value="Alterar Dados" class="btn form-btn card-btn">
                        
                    </div>
                    <div class="col-md-4">
                        <h2>Adicionar Imagem de Perfil:</h2>
                        <p>Adicione uma foto sua ao seu perfil para maior confiabilidade.</p>
                        
                            <div id="profile-image-container" style="background-image: url('<?= $BASE_URL ?>img/usuarios/<?= $usuarioData->imagem?>');">

                            </div>
                            <div class="form-group">
                                <label for="imagem">Foto:</label>
                                <input type="file" class="form-control-file" name="imagem"  value="<?= $usuarioData->imagem?>">
                            </div>
                    </div>                      
                </div>
            </form>
            <div class="col-md-4">
                        <h2>Alterar a senha:</h2>
                        <p class="page-description">Digite a nova senha e confirme, para alterar sua senha:</p>
                        <form action="<?= $BASE_URL ?>usuarios_process.php" method="POST">
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
      
        </div>
    </div>
    
<?php 
    require_once("templates/footer.php");

?>