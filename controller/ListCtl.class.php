<?php
/*
 *
 * @author Gabriel de Almeida
 */
class ListCtl extends Controller
{
	public $data = [];
    private $model,$controller, $components;

	function __construct()
	{
		$this->model = new ListModel();
		$this->ctl = new parent();
		$this->components = new Components();
		$this->routes = new Routes();
		$this->local = $_POST;
		$this->dataurl = $_GET;
	}

	public function Home(){
		$data['post'] = $this->model->pubs($_SESSION['id']);
		$data['imgUsers'] = $this->model->imgUser();
		$data['ctl'] = $this->ctl;
		return $data;
	}

	public function Pesquisa(){
		$pesquisa = $this->routes->getParameter(2);
		$data['pesquisar'] = $this->model->buscaUsuario($pesquisa);
		return $data;
	}

	public function Usuario(){
		$idUsuario = $this->routes->getParameter(2);
		$data['postUser'] = $this->model->postUser($idUsuario, $_SESSION['id']);
		$data['seguindo'] = $this->model->buscarSeguidor($_SESSION['id'], $idUsuario) > 0;
		$data['seguidor'] = $this->model->buscarSeguidor($idUsuario, $_SESSION['id']) > 0;
		$data['qtdSeguidores'] = $this->model->contarSeguidor($idUsuario);
		$data['ctl'] = $this->ctl;
		$data['infoUser'] = $this->model->infoUser($idUsuario)[0];
		$data['idUsuario'] = $idUsuario;
		return $data;
	}

	public function Comentario(){
		$idPublicacao = $this->routes->getParameter(2);
		$data['comentario'] = $this->model->comentario($idPublicacao);
		$data['ctl'] = $this->ctl;
		$data['pubComentario'] = $this->model->pubComentario($idPublicacao)[0];
		$data['idPublicacao'] = $idPublicacao;
		return $data;
	}

	public function notFoundPage(){
		$data['null'] = null;
		return $data;
	}

}