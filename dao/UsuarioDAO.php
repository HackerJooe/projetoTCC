<?php 

    require_once("models/usuario.php");
    require_once("models/messagens.php");

    class UsuarioDAO implements UsuarioDAOInterface {

        private $conn;
        private $url;

        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;	
            $this->message = new messagens($url);
        }

        public function buildUsuario($data) {
            $usuarios = new Usuarios();

            $usuarios->idusuario = $data['idusuario'];
            $usuarios->tipousuario = $data['tipousuario'];
            $usuarios->nome = $data['nome'];
            $usuarios->sobrenome = $data['sobrenome'];
            $usuarios->email = $data['email'];
            $usuarios->senha = $data['senha'];
            $usuarios->token = $data['token'];
            $usuarios->bio = $data['bio'];
            $usuarios->imagem = $data['imagem'];
            $usuarios->dddnumerowhatsapp = $data['dddnumerowhatsapp'];
            $usuarios->numerowhatsapp = $data['numerowhatsapp'];
            // $usuarios->endereco = $data['endereco'];
            // $usuarios->numero = $data['numero'];
            // $usuarios->complemento = $data['complemento'];
            // $usuarios->cep = $data['cep'];
            // $usuarios->cidade = $data['cidade'];
            // $usuarios->estado = $data['estado'];
            
            return $usuarios;
        }

        public function criar(Usuarios $usuarios, $authUsuario = false) {
            // TRATAMENTO DE OBJETO PARA INSERÇÃO AO BANCO DE DADOS
            $stmt = $this->conn->prepare("INSERT INTO usuarios(tipousuario, nome, sobrenome, email, senha, token, dddnumerowhatsapp, numerowhatsapp
                                            ) VALUES (:tipousuario, :nome, :sobrenome, :email, :senha, :token, :dddnumerowhatsapp, :numerowhatsapp) ");
            $stmt->bindParam(":tipousuario", $usuarios->tipousuario);
            $stmt->bindParam(":nome", $usuarios->nome);
            $stmt->bindParam(":sobrenome", $usuarios->sobrenome);
            $stmt->bindParam(":email", $usuarios->email);
            $stmt->bindParam(":senha", $usuarios->senha);
            $stmt->bindParam(":token", $usuarios->token);
            $stmt->bindParam(":dddnumerowhatsapp", $usuarios->dddnumerowhatsapp);
            $stmt->bindParam(":numerowhatsapp", $usuarios->numerowhatsapp);
            
            $stmt->execute();

            // AUTENTICAR O USUARIO CASO SEJA VALIDADO

            if($authUsuario) {
                $this->setTokenToSession($usuarios->token);
            }
        }

        public function update(Usuarios $usuarios, $redirect = true) {

            $stmt = $this->conn->prepare("UPDATE usuarios SET 
                nome = :nome,
                sobrenome = :sobrenome,
                email = :email,
                token = :token,
                bio = :bio,
                imagem = :imagem,
                dddnumerowhatsapp = :dddnumerowhatsapp,
                numerowhatsapp = :numerowhatsapp
                WHERE idusuario = :idusuario;
            ");

            $stmt->bindParam(":nome", $usuarios->nome);
            $stmt->bindParam(":sobrenome", $usuarios->sobrenome);
            $stmt->bindParam(":email", $usuarios->email);
            $stmt->bindParam(":bio", $usuarios->bio);
            $stmt->bindParam(":token", $usuarios->token);
            $stmt->bindParam(":imagem", $usuarios->imagem);
            $stmt->bindParam(":idusuario", $usuarios->idusuario);
            $stmt->bindParam(":dddnumerowhatsapp", $usuarios->dddnumerowhatsapp);
            $stmt->bindParam(":numerowhatsapp", $usuarios->numerowhatsapp);



            $stmt->execute();

            if($redirect) {

                // REDIRECIONAMENTO PARA O PERFIL DO USUÁRIO APÓS SALVAR O TOKEN DELE NA SESSÃO
                $this->message->inseriMessagem("Dados Atualizados com Sucesso!", "sucess", "editprofile.php");
            }
        }
        public function updateEndereco(Usuarios $usuarios, $redirect = true) {

            $stmt = $this->conn->prepare("UPDATE usuarios SET 
                endereco = :endereco,
                numero = :numero,
                complemento = :complemento,
                cep = :cep,
                cidade = :cidade,
                estado = :estado
                WHERE idusuario = :idusuario;
            ");

            $stmt->bindParam(":endereco", $usuarios->endereco);
            $stmt->bindParam(":numero", $usuarios->numero);
            $stmt->bindParam(":complemento", $usuarios->complemento);
            $stmt->bindParam(":cep", $usuarios->cep);
            $stmt->bindParam(":cidade", $usuarios->cidade);
            $stmt->bindParam(":estado", $usuarios->estado);
            $stmt->bindParam(":idusuario", $usuarios->idusuario);
            



            $stmt->execute();

            if($redirect) {

                // REDIRECIONAMENTO PARA O PERFIL DO USUÁRIO APÓS SALVAR O TOKEN DELE NA SESSÃO
                $this->message->inseriMessagem("Dados Atualizados com Sucesso!", "sucess", "editprofile.php");
            }
        }

        public function verifyToken ($protected = false) {
            // $url = $this->url;
            if(!empty($_SESSION["token"])) {
                // PEGA O TOKEN E INSERI NA SESSÃO
                $token = $_SESSION["token"];

                $usuarios = $this->findByToken($token);

                if($usuarios) {
                    return $usuarios;
                } else if($protected != true) { // != true
                     // REDIRECIONAMENTO PARA O USUÁRIO NÃO AUTENTICADO 
                    $this->message->inseriMessagem("Faça seu Login ou Cadastre-se", "error", "index.php");
                }
            } else if($protected == true) {
                // REDIRECIONAMENTO PARA O USUÁRIO NÃO AUTENTICADO
                //return false;
                // print_r($url);
                $this->message->inseriMessagem("Faça sua autenticação para acessar está página! ", "error", "");
            }

        }

        public function setTokenToSession($token, $redirect = true) {

            // SALVAR TOKEN NA SESSÃO
            $_SESSION["token"] = $token;

            if($redirect) {

                // REDIRECIONAMENTO PARA O PERFIL DO USUÁRIO APÓS SALVAR O TOKEN DELE NA SESSÃO
                $this->message->inseriMessagem("Seja Bem vindo!", "sucess", "editprofile.php");
            }
        }

        public function autenticaUsuario($email, $senha) {
            $usuarios = $this->findByEmail($email);

            if($usuarios){
                if(password_verify($senha, $usuarios->senha)) {
                    // GERAR UM TOKEN E INSERIR NOVAMENTE NA SESSÃO
                    $token = $usuarios->generateToken();

                    $this->setTokenToSession($token, false);
                    
                    // ATUALIZA O NOVO TOKEN DO USUARIO 
                    $usuarios->token = $token;

                    $this->update($usuarios, false);

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        }

        public function findByEmail($email) {
            if($email != ""){
                $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");

                $stmt->bindParam(":email", $email);

                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    $data = $stmt->fetch();
                    $usuarios = $this->buildUsuario($data);

                    return $usuarios;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function findByToken($token) {
            if($token != ""){
                $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE token = :token");

                $stmt->bindParam(":token", $token);

                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    $data = $stmt->fetch();
                    $usuarios = $this->buildUsuario($data);

                    return $usuarios;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function findById($idusuario) {

        }

        public function alteraSenha(Usuarios $usuarios) {
            $stmt = $this->conn->prepare("UPDATE usuarios SET 
            senha = :senha
            WHERE idusuario = :idusuario");

            $stmt->bindParam(":senha", $usuarios->senha);
            $stmt->bindParam(":idusuario", $usuarios->idusuario);

            $stmt->execute();

            // print_r($usuarios);
            $this->message->inseriMessagem("Senha Alterada com Sucesso!", "sucess", "editprofile.php");
            
        }

        public function destroyToken(){

            // REMOVE O TOKEN QUE ESTÁ GRAVADO NA SESSÃO
            $_SESSION["token"] = "";

            // REDIRECIONA O USUARIO E ENVIA MENSAGEM DE SUCESSO AO DESLOGAR

            $this->message->inseriMessagem("Você deslogou com sucesso de sua conta! Volte Sempre!", "sucess", "index.php");
        }
    }