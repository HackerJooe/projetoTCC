<?php 
    require_once("globals.php");
    require_once("db.php");
    require_once("models/usuario.php");
    require_once("dao/UsuarioDAO.php");
    require_once("models/messagens.php");

    // INSTANCIANDO A MENSAGEM
    $message = new messagens($BASE_URL);
    // INSTANCIANDO O USUARIODAO
    $usuarioDAO = new UsuarioDAO($conn, $BASE_URL);
    // RESGATA QUAL É O TIPO DO FORMULÁRIO QUE ESTÁ SENDO ENVIANDO PELO USUÁRIO
    $type = filter_input(INPUT_POST, "type");
    // ATUALIZAR O USUARIO
    if($type === "update") {

        // RESGATA OS DADOS DO USUÁRIO QUE ESTÁ LOGADO E EXECUTOU A FUNCAO
        $usuarioData = $usuarioDAO->verifyToken();

        // PEGA OS DADOS DO INPUT POST UPDATE ENVIADOS
        $nome = filter_input(INPUT_POST,"nome");
        $sobrenome = filter_input(INPUT_POST,"sobrenome");
        $email = filter_input(INPUT_POST,"email");
        $bio = filter_input(INPUT_POST,"bio");

        // CRIA UM NOVO OBJETO USUARIO
        $usuarios = new Usuarios();

        // PREENCHER OS DADOS DO USUARIO
        $usuarioData->nome = $nome;
        $usuarioData->sobrenome = $sobrenome;
        $usuarioData->email = $email;
        $usuarioData->bio = $bio;

        // UPLOAD DA IMAGEM DO USUÁRIO
        if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]["tmp_name"])) {
            // CAPTURA OS ULTIMOS QUATRO DIGITOS DO ARQUIVO QUE FOI ENVIADO 
            $imagem = strtolower(substr($_FILES['imagem']['name'], -4));
            // ARRAY DOS TIPOS DE IMAGENS SUPORTADAS
            $imageTypes = ["jpeg", ".jpg", ".png"];
            $jpgarray = [".jpeg", ".jpg"];
            // DEFINE UM NOVO NOME AO ARQUIVO ENVIADO E ADICIONA A EXTENSÃO AO ARQUIVO RENOMEADO   md5(time()) . $imagem
            $novoNomeImagem = $usuarios->generateNameImage();
            // DEFINE A RAIZ DO DIRETORIO 
            $diretorio = "img/usuarios/";
            // EFETUA O UPLOAD DO ARQUIVO PARA O NOVO DIRETORIO
            if (in_array($imagem, $imageTypes)) {
              
              $usuarioData->imagem = $novoNomeImagem;
              move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novoNomeImagem);

            } else {
              $message->inseriMessagem("Tipo de arquivo não suportado. Favor enviar jpeg, jpg ou png!", "error", "back");
            }

      
        }

        $usuarioDAO->update($usuarioData);

        // ATUALIZAR SENHA DO USUARIO
    } else if($type === "alteraSenha") {
      
      $senha = filter_input(INPUT_POST,"senha");
      $confirmasenha = filter_input(INPUT_POST,"confirmasenha");
      $idusuario = filter_input(INPUT_POST,"idusuario");
      
      if($senha == $confirmasenha){
        
        $usuarios = new Usuarios();

        $finalSenha2 = $usuarios->generateSenha($senha);
        
        $usuarios->senha = $finalSenha2;
        $usuarios->idusuario = $idusuario;

        $usuarioDAO->alteraSenha($usuarios);



      } else {
        $message->inseriMessagem("As senhas não coincidem!", "error", "back");

      }

      // ATUALIZAR FOTO DE PERFIL DO USUÁRIO
    }  else {
        $message->inseriMessagem("Informações inválidas!", "error", "logout.php");
    }

?>