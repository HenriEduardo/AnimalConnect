<?php
/*  Classe de requisições, aqui é feito todas as ações do sistema
*   (CREATE,READ,UPDATE,DELETE)
*   (CONSULTA DE APIS)
*   ()
*/

class Request
{

    public $routes, $Mod, $local, $dataurl;
    private $alphabet = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'y', 'x', 'z'];

    //Construtor verifica se a função existe e executa ela
    function __construct($actionRequest)
    {
        if (method_exists($this, $actionRequest)) {
            $this->routes = new Routes();
            include_once "model/Model.class.php";
            include_once "controller/Controller.class.php";
            $this->Mod = new Model();
            $this->local = $_POST;
            $this->dataurl = $_GET;
            $this->ctl = new Controller();
            $this->$actionRequest();
            die();
        } else {
            throw new error('Action request not found: ' . $actionRequest);
        }
    }

    public function registrar() {
        
        $arrayData[0] = $this->local['nome'];
        $arrayData[1] = $this->local['dataNascimento'];
        $arrayData[2] = $this->local['email'];
        $arrayData[3] = $this->local['senha'];
        $arrayData[4] = $this->local['usuario'];
        $arrayData[5] = $this->local['nomeAnimal'];
        $arrayData[6] = $this->local['dataNascimentoAnimal'];  
        $arrayData[7] = null;
        $extensao = strtolower(pathinfo($_FILES['img-perfil']['name'], PATHINFO_EXTENSION));
        $arrayData[7] = uniqid() .'.'. $extensao;
        move_uploaded_file($_FILES["img-perfil"]["tmp_name"], "./images/perfil/".$arrayData[7]);

        $verificaEmail = $this->Mod->getData("SELECT * FROM users WHERE email = '$arrayData[2]'");
        $verificaUsuario = $this->Mod->getData("SELECT * FROM users WHERE usuario = '$arrayData[4]'");

        $hoje = date("Y-m-d");
        $idade = ((int)$hoje - (int)$arrayData[1]);

        if (count($verificaUsuario) > 0 && count($verificaEmail) > 0) {
            $this->ctl->redirectWithMessage("fail","Este usuário e este e-mail já estão cadastrados!");
        } elseif (count($verificaEmail) > 0) {
            $this->ctl->redirectWithMessage("fail","Este e-mail já está cadastrado!");
        } elseif ($idade < 16) {
            $this->ctl->redirectWithMessage("fail","Não aceitamos pessoas menores de 16 anos. Espere completar 16 anos para poder criar uma conta!");
        } elseif (count($verificaUsuario) > 0) {
            $this->ctl->redirectWithMessage("fail","Este usuário já está cadastrado!");
        } else {
            $result = $this->Mod->getDataEncapsule("INSERT INTO users (nome, dataNascimento, email, senha, usuario, nomeAnimal, dataNascimentoAnimal, img)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)", $arrayData);
            $this->ctl->redirectTo("Home");
        }

    }

    public function editarPerfil() {
        
        $arrayData[0] = $this->local['nome'];
        $arrayData[1] = $this->local['dataNascimento'];
        $arrayData[2] = $this->local['email'];
        $arrayData[3] = $this->local['senha'];
        $arrayData[4] = $this->local['usuario'];
        $arrayData[5] = $this->local['nomeAnimal'];
        $arrayData[6] = $this->local['dataNascimentoAnimal'];  
        $arrayData[7] = null;
        $arrayData[8] = $_SESSION['id'];
        $extensao = strtolower(pathinfo($_FILES['img-perfil']['name'], PATHINFO_EXTENSION));
        $arrayData[7] = uniqid() .'.'. $extensao;
        move_uploaded_file($_FILES["img-perfil"]["tmp_name"], "./images/perfil/".$arrayData[7]);

        $verificaEmail = $this->Mod->getData("SELECT * FROM users WHERE email = '$arrayData[2]'");
        $verificaUsuario = $this->Mod->getData("SELECT * FROM users WHERE usuario = '$arrayData[4]'");

        $hoje = date("Y-m-d");
        $idade = ((int)$hoje - (int)$arrayData[1]);

        if (count($verificaUsuario) > 0 && count($verificaEmail) > 0) {
            $this->ctl->redirectWithMessage("fail","Este usuário e este e-mail já estão cadastrados!");
        } elseif (count($verificaEmail) > 0) {
            $this->ctl->redirectWithMessage("fail","Este e-mail já está cadastrado!");
        } elseif ($idade < 16) {
            $this->ctl->redirectWithMessage("fail","Não aceitamos pessoas menores de 16 anos. Espere completar 16 anos para poder criar uma conta!");
        } elseif (count($verificaUsuario) > 0) {
            $this->ctl->redirectWithMessage("fail","Este usuário já está cadastrado!");
        } else {
            $result = $this->Mod->getDataEncapsule("UPDATE users SET nome = ?, dataNascimento = ?, email = ?, senha = ?, usuario = ?, nomeAnimal = ?, dataNascimentoAnimal = ?, img = ? WHERE id = ?", $arrayData);
            $this->ctl->redirectTo("Home");
        }

    }

    public function verifica() {

        $arrayData[0] = $this->local['usuario'];
        $arrayData[1] = $this->local['senha'];

        $result = $this->Mod->getDataEncapsule("SELECT * FROM users WHERE usuario = ? AND senha = ?", $arrayData);

        if ($result == null) {
            $this->ctl->redirectWithMessage("fail","Login ou senha incorretos!");
        }
        else {
            $_SESSION['usuario'] = $arrayData[0];
            $_SESSION['id'] = $result[0]['id'];
            $this->ctl->redirectTo("Home");
        }

        if (!$_SESSION['usuario']) {
            $this->ctl->redirectTo("Login");
        }

    }

    public function post() {

        $arrayData[0] = $_SESSION['id'];
        $arrayData[1] = $this->local['texto'];
        $arrayData[2] = date("Y-m-d H:i");
        $arrayData[3] = null;

            if ($arrayData[1] == ""){
                $this->ctl->redirectWithMessage("fail","Não aceitamos publicação em branco, escreva alguma coisa para publicar!");
                die();
            }

        try{
            if (isset($_FILES['file-upload']['name']) && !empty($_FILES['file-upload']['name'])){
                $extensao = strtolower(pathinfo($_FILES['file-upload']['name'], PATHINFO_EXTENSION));
                $arrayData[3] = uniqid() .'.'. $extensao;
                move_uploaded_file($_FILES["file-upload"]["tmp_name"], "./images/post/".$arrayData[3]);

            }

            $result = $this->Mod->insertDataEncapsule("INSERT INTO publicacao (id_usuario, texto, dataPublicacao, imagem) VALUES (?, ?, ?, ?)", $arrayData);
            $this->ctl->redirectWithMessage("fail", "Postagem publicada!");

        }
        catch(Exception $e){
            $this->ctl->redirectWithMessage("fail", "Houve um erro ao tentar incluir publicação, Detalhes:" . $e->getMessage());
        }

    }

    public function comentario() {

        $arrayData[0] = $this->local['id-publicacao'];
        $arrayData[1] = $_SESSION['id'];
        $arrayData[2] = $this->local['textoComentario'];
        $arrayData[3] = date("Y-m-d H:i");

        if ($arrayData[0] == "") {
            $this->ctl->redirectWithMessage("fail","Não aceitamos comentário em branco, escreva alguma coisa para comentar nesta publicação!");
        } 
        else {
            $result = $this->Mod->insertDataEncapsule("INSERT INTO comentario (id_publicacao, id_usuario, textoComentario, dataComentario) VALUES (?, ?, ?, ?)", $arrayData);
            $this->ctl->redirectTo("Home");
        }

    }

    public function seguir() {

        $arrayData[0] = $_SESSION['id'];
        $arrayData[1] = $this->local['id-usuario'];

        $result = $this->Mod->insertDataEncapsule("INSERT INTO seguidores (idSeguidorPrincipal, idSeguidorSecundario) VALUES (?, ?)", $arrayData);
        $this->ctl->redirectWithMessage("fail", "Você agora segue este usuário");

    }    
    
    public function deixarDeSeguir() {

        $arrayData[0] = $_SESSION['id'];
        $arrayData[1] = $this->local['id-usuario'];

        $result = $this->Mod->insertDataEncapsule("DELETE FROM seguidores WHERE idSeguidorPrincipal = ? AND idSeguidorSecundario = ?", $arrayData);
        $this->ctl->redirectWithMessage("fail", "Você agora não segue mais este usuário");

    }   

    public function like() {

        $arrayData[0] = $this->local['id-publicacao'];
        $arrayData[1] = $_SESSION['id'];

        $result = $this->Mod->insertDataEncapsule("INSERT INTO likes (idPublicacao, idUsuario) VALUES (?, ?)", $arrayData);
        $this->ctl->redirectWithMessage("success", "Você acabou de curtir esta publicação");

    } 

    public function deslike() {

        $arrayData[0] = $this->local['id-publicacao'];
        $arrayData[1] = $_SESSION['id'];

        $result = $this->Mod->insertDataEncapsule("DELETE FROM likes WHERE idPublicacao = ? AND idUsuario = ?", $arrayData);
        $this->ctl->redirectWithMessage("fail", "Você acabou de descurtir esta publicação");

    } 

    private function logoff()
    {
        session_unset();
        session_destroy();
        clearstatcache();
        echo "<script>window.location.href = '" . URL . "';</script>";
    }


}
