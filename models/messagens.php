<?php 

    class messagens {
        
        private $url;

        public function __construct($url) {
            $this->url = $url;
        }

        public function inseriMessagem($msg, $type, $redirect = "index.php") {
            $_SESSION["msg"] = $msg;
            $_SESSION["type"] = $type;
            $url = $this->url;

            if ($redirect != "back") {
                header('Location:'. $url . $redirect);
            } else {
                header('Location: ' . $_SERVER["HTTP_REFERER"]);
            }
        }

        public function pegarMessagem() {
            if(!empty($_SESSION["msg"])) {
                return[
                    "msg" => $_SESSION["msg"],
                    "type" => $_SESSION["type"]
                ];
            } else {
                return false;
            }
        }

        public function limparMessagem() {
            $_SESSION["msg"] = "";
            $_SESSION["type"] = "";
        }
    }