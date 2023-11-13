<?php 

    require_once("globals.php");
    require_once("db.php");
    require_once("models/domicilio.php");
    require_once("models/messagens.php");
    require_once("dao/UsuarioDAO.php");
    require_once("dao/DomicilioDAO.php");

    $message = new messagens($BASE_URL);
    $usuarioDAO = new UsuarioDAO($conn, $BASE_URL);
    
    $domicilioDao = new DomicilioDAO($conn, $BASE_URL);
    // RESGATA O TIPO DE FORMULÁRIO PARA A PRIMEIRA VALIDAÇÃO
    $type = filter_input(INPUT_POST, "type");
    // SEGUNDA ETAPA DE VALIDAÇÃO SE EXISTE UM USUÁRIO LOGADO
    $usuarioData = $usuarioDAO->verifyToken(true);

    // print_r($usuarioData);

    if($type == "create_domicilio" && $usuarioData->tipousuario == 1 ) {

        $domicilio = new Domicilio();
        $tipodomicilio = filter_input(INPUT_POST, "tipodomicilio");
        $descricao = filter_input(INPUT_POST, "descricao");
        $enderecodom = filter_input(INPUT_POST, "enderecodom");
        $numerodom = filter_input(INPUT_POST, "numerodom");
        $cidadedom = filter_input(INPUT_POST, "cidadedom");
        $estadodom = filter_input(INPUT_POST, "estadodom");
        $cepdom = filter_input(INPUT_POST, "cepdom");
        $idusuario = filter_input(INPUT_POST, "idusuario"); 

        if(!empty($tipodomicilio) && !empty($descricao) && !empty($enderecodom) && !empty($numerodom) && !empty($cidadedom) && !empty($estadodom) && !empty($cepdom) && !empty($idusuario)) {
              $separador = ", ";
            // CAPTURAR OS DADOS NO INPUT POST
            
            $caracteristicas = $_POST['caracteristicas'];
            $strCaracteristicas = implode($separador, $caracteristicas);
            $caracteristicasadc = filter_input(INPUT_POST, "caracteristicasadc"); 
            $metragem = filter_input(INPUT_POST, "metragem");
            $complementodom = filter_input(INPUT_POST, "complementodom");
            $mensalidade = filter_input(INPUT_POST, "mensalidade");
            $iptu = filter_input(INPUT_POST, "iptu");

            $domicilio->usuario_id = $idusuario;
            $domicilio->tipodomicilio = $tipodomicilio;
            $domicilio->descricao = $descricao;
            $domicilio->caracteristicas = $strCaracteristicas;
            $domicilio->caracteristicasadc = $caracteristicasadc;
            $domicilio->metragem = $metragem;
            $domicilio->enderecodom = $enderecodom;
            $domicilio->numerodom = $numerodom;
            $domicilio->complementodom = $complementodom;
            $domicilio->cepdom = $cepdom;
            $domicilio->cidadedom = $cidadedom;
            $domicilio->estadodom = $estadodom;
            $domicilio->mensalidade = $mensalidade;
            $domicilio->iptu = $iptu;

            // UPLOAD DA CAPA DO DOMICILIO
            if(isset($_FILES["imagemdomicilio"]) && !empty($_FILES["imagemdomicilio"]["tmp_name"])) {
                // CAPTURA OS ULTIMOS QUATRO DIGITOS DO ARQUIVO QUE FOI ENVIADO 
                $imagem = strtolower(substr($_FILES['imagemdomicilio']['name'], -4));
                // ARRAY DOS TIPOS DE IMAGENS SUPORTADAS
                $imageTypes = ["jpeg", ".jpg", ".png"];
                $jpgarray = [".jpeg", ".jpg"];
                // DEFINE UM NOVO NOME AO ARQUIVO ENVIADO E ADICIONA A EXTENSÃO AO ARQUIVO RENOMEADO   md5(time()) . $imagem
                $novoNomeImagem = $domicilio->generateNameImage();
                // DEFINE A RAIZ DO DIRETORIO 
                $diretorio = "img/domicilio/";
                // EFETUA O UPLOAD DO ARQUIVO PARA O NOVO DIRETORIO
                if (in_array($imagem, $imageTypes)) {
                  
                  $domicilio->imagemdomicilio = $novoNomeImagem;
                  move_uploaded_file($_FILES['imagemdomicilio']['tmp_name'], $diretorio.$novoNomeImagem);
    
                } else {
                  $message->inseriMessagem("Tipo de arquivo não suportado. Favor enviar jpeg, jpg ou png!", "error", "back");
                }
            }
        } else {
            $message->inseriMessagem("Informações Minimas Necessárias: Tipo Domicilio,  Descrição, e o campos de endereço completo.", "error", "back");
        }
        $domicilioDao->createDomicilio($domicilio);

     } elseif ($usuarioData->tipousuario == '2') {
        $message->inseriMessagem("O seu tipo de usuário não tem permisão para adicionar domícilios.", "error", "back");
     } else {
        
        $message->inseriMessagem("Informações Inválidas! Preencha os campos corretamente!", "error", "back");
     }


?>