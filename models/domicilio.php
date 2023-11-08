<?php 

    class Domicilio {
        public $iddomicilio;
        public $tipodomicilio;
        public $descricao;
        public $imagemdomicilio;
        public $caracteristicas = [];
        public $caracteristicasadc;
        public $metragem;
        public $enderecodom;
        public $numerodom;
        public $complementodom;
        public $cepdom;
        public $cidadedom;
        public $estadodom;
        public $usuario_id;
        public $mensalidade;
        public $iptu;

        public function generateNameImage() {
            return bin2hex(random_bytes(30)) . ".jpg";
        }
    }

    interface DomicilioDAOInterface {
        // recebe dados e cria objeto
        public function buildDomicilio($data);
        //  encontra todos os domicilios do banco
        public function findAll();
        // encontra todos os domicilios so traz em ordem decrescente
        public function getLatestDomicilios();
        // encontra domicilio por estados
        public function getDomicilioByEstado($estadodom);
        // encontra domicilios que o locador cadastrou
        public function getDomicilioByUsuario($idusuario);
        // encontra domicilio por id 
        public function findById($iddomicilio); // ou "usuario_id" -> testar se der erro, alterar em dom by usuario e em destroy dom
        // encontra domicilio por cidade
        public function getDomicilioByCidade($cidadedom);
        // criar domicilio
        public function createDomicilio(Domicilio $domicilio);
        public function updateDomicilio(Domicilio $domicilio);
        public function destroyDomicilio($idusuario);
    }

?>