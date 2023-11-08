<?php 
    require_once("models/domicilio.php");
    require_once("models/messagens.php");

    class DomicilioDAO implements DomicilioDAOInterface {
        private $conn;
        private $url;
        private $message;

        public function __construct(PDO $conn, $url) {
            $this->conn = $conn;
            $this->url = $url;
            $this->message = new messagens($url);
        }

        // recebe dados e cria objeto
        public function buildDomicilio($data) {
            $domicilio = new Domicilio();

            $domicilio->iddomicilio = $data["iddomicilio"];
            $domicilio->tipodomicilio = $data["tipodomicilio"];
            $domicilio->descricao = $data["descricao"];
            $domicilio->imagemdomicilio = $data["imagemdomicilio"];
            $domicilio->caracteristicas = $data["caracteristicas"];
            $domicilio->caracteristicasadc = $data["caracteristicasadc"];
            $domicilio->metragem = $data["metragem"];
            $domicilio->enderecodom = $data["enderecodom"];
            $domicilio->numerodom = $data["numerodom"];
            $domicilio->complementodom = $data["complementodom"];
            $domicilio->cepdom = $data["cepdom"];
            $domicilio->cidadedom = $data["cidadedom"];
            $domicilio->estadodom = $data["estadodom"];
            $domicilio->mensalidade = $data["mensalidade"];
            $domicilio->iptu = $data["iptu"];
            $domicilio->usuario_id = $data["user_id"];

            return($domicilio);
        }
        //  encontra todos os domicilios do banco
        public function findAll() {

        }
        // encontra todos os domicilios so traz em ordem decrescente
        public function getLatestDomicilios() {
            $domicilios = [];

            $stmt = $this->conn->query("SELECT * FROM domicilios ORDER BY iddomicilio DESC;");

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $domiciliosArray = $stmt->fetchAll();

                foreach($domiciliosArray as $domicilio){
                    $domicilios[] = $this->buildDomicilio($domicilio);
                }
                return $domicilios;
            }

            
        }
        // encontra domicilio por estados
        public function getDomicilioByEstado($estadodom) {
            $domicilios = [];

            $stmt = $this->conn->prepare("SELECT * FROM domicilios 
                                          WHERE estadodom = :estadodom
                                          ORDER BY iddomicilio DESC;");

            $stmt->bindParam(":estadodom", $estadodom);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $domiciliosArray = $stmt->fetchAll();

                foreach($domiciliosArray as $domicilio){
                    $domicilios[] = $this->buildDomicilio($domicilio);
                }
                return $domicilios;
            }
        }
        // encontra domicilios que o locador cadastrou
        public function getDomicilioByUsuario($idusuario) {
            $domicilios = [];

            $stmt = $this->conn->prepare("SELECT * FROM domicilios 
                                          WHERE user_id = :user_id
                                          ");

            $stmt->bindParam(":user_id", $idusuario);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $domiciliosArray = $stmt->fetchAll();

                foreach($domiciliosArray as $domicilio){
                    $domicilios[] = $this->buildDomicilio($domicilio);
                }
            }
            return $domicilios;
        }
        // encontra domicilio por id 
        public function findById($iddomicilio) {
            $domicilio = [];

            $stmt = $this->conn->prepare("SELECT * FROM domicilios 
                                          WHERE iddomicilio = :iddomicilio;");

            $stmt->bindParam(":iddomicilio", $iddomicilio);

            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $domicilioData = $stmt->fetch();
                $domicilio = $this->buildDomicilio($domicilioData);
                
            } else {
                return false;
            }
            return $domicilio;
        }
        // encontra domicilio por cidade
        public function getDomicilioByCidade($cidadedom) {

        }
        // criar domicilio
        public function createDomicilio(Domicilio $domicilio) {
            $stmt = $this->conn->prepare("INSERT INTO domicilios (tipodomicilio, descricao, imagemdomicilio, caracteristicasadc, caracteristicas, metragem, user_id, enderecodom, numerodom, complementodom, cepdom, cidadedom, estadodom, mensalidade, iptu) VALUES (:tipodomicilio, :descricao, :imagemdomicilio, :caracteristicasadc, :caracteristicas, :metragem, :idusuario, :enderecodom, :numerodom, :complementodom, :cepdom, :cidadedom, :estadodom, :mensalidade, :iptu);");

            $stmt->bindParam(":tipodomicilio", $domicilio->tipodomicilio);
            $stmt->bindParam(":descricao", $domicilio->descricao);
            $stmt->bindParam(":imagemdomicilio", $domicilio->imagemdomicilio);
            $stmt->bindParam(":caracteristicasadc", $domicilio->caracteristicasadc);
            $stmt->bindParam(":caracteristicas", $domicilio->caracteristicas);
            $stmt->bindParam(":metragem", $domicilio->metragem);
            $stmt->bindParam(":idusuario", $domicilio->usuario_id);
            $stmt->bindParam(":enderecodom", $domicilio->enderecodom);
            $stmt->bindParam(":numerodom", $domicilio->numerodom);
            $stmt->bindParam(":complementodom", $domicilio->complementodom);
            $stmt->bindParam(":cepdom", $domicilio->cepdom);
            $stmt->bindParam(":cidadedom", $domicilio->cidadedom);
            $stmt->bindParam(":estadodom", $domicilio->estadodom);
            $stmt->bindParam(":mensalidade", $domicilio->mensalidade);
            $stmt->bindParam(":iptu", $domicilio->iptu);

            $stmt->execute();

            $this->message->inseriMessagem("Domicilio adicionado com sucesso!!!", "sucess", "back");
            
        }
        public function updateDomicilio(Domicilio $domicilio) {

        }
        public function destroyDomicilio($id) {

        }
    }


?>