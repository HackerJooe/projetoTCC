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
        $dddnumerowhatsapp = filter_input(INPUT_POST, "dddnumerowhatsapp");
        $numerowhatsapp = filter_input(INPUT_POST, "numerowhatsapp");

        $qtdnumeros = strlen(trim($numerowhatsapp));
        // CRIA UM NOVO OBJETO USUARIO
        $usuarios = new Usuarios();
        

        // PREENCHER OS DADOS DO USUARIO
        $usuarioData->nome = $nome;
        $usuarioData->sobrenome = $sobrenome;
        $usuarioData->email = $email;
        $usuarioData->bio = $bio;
        $usuarioData->dddnumerowhatsapp = $dddnumerowhatsapp;
        $usuarioData->numerowhatsapp = $numerowhatsapp;

       

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

        if($qtdnumeros == 9) {
          print_r($qtdnumeros);
          $usuarioDAO->update($usuarioData);
        } else {
          $message->inseriMessagem("Número do Whatsapp com caracteres insuficientes/incorretos", "error", "back");
        }

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
    } else if($type === "updateEndereco") {

        // RESGATA OS DADOS DO USUÁRIO QUE ESTÁ LOGADO E EXECUTOU A FUNCAO
        $usuarioData = $usuarioDAO->verifyToken();

        // PEGA OS DADOS DO INPUT POST UPDATE ENVIADOS
        $endereco = filter_input(INPUT_POST,"endereco");
        $numero = filter_input(INPUT_POST, "numero");
        $complemento = filter_input(INPUT_POST, "complemento");
        $cep = filter_input(INPUT_POST, "cep");
        $cidade = filter_input(INPUT_POST, "cidade");
        $estado = filter_input(INPUT_POST, "estado");

        // CRIA UM NOVO OBJETO USUARIO
        $usuarios = new Usuarios();

        // PREENCHER OS DADOS DO USUARIO
        $usuarioData->endereco = $endereco;
        $usuarioData->numero = $numero;
        $usuarioData->complemento = $complemento;
        $usuarioData->cep = $cep;
        $usuarioData->cidade = $cidade;
        $usuarioData->estado = $estado;
        if (!empty($endereco) && !empty($numero) && !empty($complemento) && !empty($cep) && !empty($cidade) && !empty($estado)) {
          $usuarioDAO->updateEndereco($usuarioData);
          $message->inseriMessagem("Endereço cadastrado/atualizado com sucesso!!!", "sucess", "back");
        } else {
          $message->inseriMessagem("Para o cadastro de endereço, todos os campos devem sem preenchidos", "error", "back");
        }
     
    } else {
        $message->inseriMessagem("Informações inválidas!", "error", "logout.php");
    }

?>