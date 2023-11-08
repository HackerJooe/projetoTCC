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
    // echo $type; -> FORMA DE CONFIRMAR O TIPO DE FORMULARIO QUE ESTÁ SENDO ENVIADO, PRINTANDO NA PAGINA

    // VERIFICA O TIPO DE FORMULÁRIO E FAZ A REQUISIÇÃO DOS INPUT'S
    if($type === "registro") {

        $tipousuario = filter_input(INPUT_POST,"tipousuario");
        $email = filter_input(INPUT_POST,"email");
        $nome = filter_input(INPUT_POST,"nome");
        $sobrenome = filter_input(INPUT_POST,"sobrenome");
        $senha = filter_input(INPUT_POST,"senha");
        $confirmaSenha = filter_input(INPUT_POST,"confirmasenha");

        // VERIFICAÇÃO MÍNIMA DE DADOS
        if($tipousuario && $nome && $sobrenome && $senha && $email) {
            // VALIDA SE O TIPO DE USUARIO FOI SELECIONADO CASO CONSIGA BURLAR O SISTEMA  
           if($tipousuario > 0 && $tipousuario < 3) {
            // VALIDAR A SENHA E A CONFIRMAÇÃO DA SENHA SE ESTÃO DE ACORDO
            if($senha === $confirmaSenha) {
                // VALIDAR SE O EMAIL DIGITADO PELO USUÁRIO JÁ ESTÁ CADASTRADO EM NOSSO BANCO
                if($usuarioDAO->findByEmail($email) === false) {
                    $usuario = new Usuarios();

                    // CRIAÇÃO DE TOKENS
                    $usuarioToken = $usuario->generateToken();
                    $finalSenha = $usuario->generateSenha($senha);

                    $usuario->tipousuario = $tipousuario;
                    $usuario->nome = $nome;
                    $usuario->sobrenome = $sobrenome;
                    $usuario->email = $email;
                    $usuario->senha = $finalSenha;
                    $usuario->token = $usuarioToken;

                    $autentic = true;

                    $usuarioDAO->criar($usuario, $autentic);
                } else {
                    // ENVIA MENSAGEM QUE AS SENHAS NÃO COINCIDEM
                    $message->inseriMessagem("Email já cadastrado, tente outro email ou tente recuperar sua conta.", "error", "back");
                }
            } else {
                // ENVIA MENSAGEM QUE AS SENHAS NÃO COINCIDEM
                $message->inseriMessagem("Os campos senha e confirmação de senha não coincidem.", "error", "back");
            }
           } else {
            $message->inseriMessagem("Insira o tipo de usuário(LOCADOR OU LOCATÁRIO)", "error", "back");
           }
            
        } else {
            // ENVIAR MENSAGEM DE ERRO AO ENVIAR OS INPUT'S COM OS DADOS
            $message->inseriMessagem("Por favor, preencha todos os campos corretamente.", "error", "back");
        }
    } else if ($type === "login") {
        $email = filter_input(INPUT_POST,"email");
        $senha = filter_input(INPUT_POST,"senha");

        if($usuarioDAO->autenticaUsuario($email,$senha)) {

            
            $message->inseriMessagem("Seja Bem Vindo!", "sucess", "editprofile.php");
            

            // Redireciona caso falhe a autenticação de login
        } else {
            $message->inseriMessagem("Usuário e/ou Senha incorretos!", "error", "back");
        }
    } else {
        $message->inseriMessagem("Informações inválidas!", "error", "index.php");

    } 