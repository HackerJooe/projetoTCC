<?php 

    class Usuarios {
        public $idusuario;
        public $tipousuario;
        public $nome;
        public $sobrenome;
        public $email;
        public $senha;
        public $token;
        public $bio;
        public $id_endereco;
        public $imagem;
        public $numerowhatsapp;
        public $dddnumerowhatsapp;
        public $endereco;
        public $numero;
        public $complemento;
        public $cep;
        public $cidade;
        public $estado;

        public function pegarNomeCompleto($usuarios) {
            return $usuarios->nome . " " . $usuarios->sobrenome;
        }

        public function generateToken() {
            return bin2hex(random_bytes(50));
        }

        public function generateSenha($senha){
            return password_hash($senha, PASSWORD_DEFAULT);
        }

        public function generateNameImage() {
            return bin2hex(random_bytes(30)) . ".jpg";
        }

    } 

    interface UsuarioDAOInterface {
        public function buildUsuario($data);

        public function criar(Usuarios $usuarios, $authUsuario = false);

        public function update(Usuarios $usuarios, $redirect);
        
        public function updateEndereco(Usuarios $usuarios, $redirect);

        public function verifyToken ($protected = false);

        public function setTokenToSession($token, $redirect = true);

        public function autenticaUsuario($email, $senha);

        public function findByEmail($email);

        public function findByToken($token);

        public function findById($idusuario);

        public function alteraSenha(Usuarios $usuarios);

        public function destroyToken();
    }

?>