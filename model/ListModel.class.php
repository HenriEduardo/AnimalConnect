<?php

/**
 * @author Gabriel de Almeida
 */
class ListModel extends Model
{
	private $Model;
	
	function __construct()
	{
		$this->Model = new parent();
	}

	function imgUser()
	{
		$imgUsers = $this->Model->getData("SELECT * FROM users");
		return $imgUsers;
	}

	function pubs($idUsuario)
	{
		$post = $this->Model->getData("SELECT p.id, p.texto, p.imagem, p.id_usuario, p.dataPublicacao, u.nome, u.usuario, u.img, CASE WHEN (SELECT 1 FROM likes WHERE idPublicacao = p.id AND idUsuario = " .$idUsuario. " ) IS NOT NULL THEN 1 ELSE 0 END AS likepub FROM publicacao p JOIN users u ON p.id_usuario = u.id WHERE p.id_usuario IN (SELECT idSeguidorSecundario FROM seguidores WHERE idSeguidorPrincipal = " .$idUsuario ." ) ORDER BY p.id DESC");
		return $post;
	}

	function postUser($id, $idUsuario)
	{
		$postUser = $this->Model->getData("SELECT p.id, p.texto, p.imagem, p.id_usuario, p.dataPublicacao, u.nome, u.usuario, u.img, CASE WHEN (SELECT 1 FROM likes WHERE idPublicacao = p.id AND idUsuario = " .$idUsuario. " ) IS NOT NULL THEN 1 ELSE 0 END AS likepub FROM publicacao p JOIN users u ON p.id_usuario = u.id AND id_usuario = " .$id. " ORDER BY p.id DESC;");
		return $postUser;
	}

	function infoUser($id)
	{
		$infoUser = $this->Model->getData("SELECT id, usuario, nome, nomeAnimal, dataNascimento, dataNascimentoAnimal, img FROM `users` WHERE id = " .$id);
		return $infoUser;
	}

	function comentario($id)
	{
		$comentario = $this->Model->getData("SELECT c.id, c.textoComentario, c.id_usuario, c.id_publicacao, c.dataComentario, p.id, p.texto, p.imagem, p.id_usuario, p.dataPublicacao, u.id, u.nome, u.usuario, u.img FROM `comentario` c, publicacao p, users u WHERE c.id_publicacao = p.id AND c.id_usuario = u.id AND id_publicacao = " .$id. " ORDER BY c.id desc");
		return $comentario;
	}

	function pubComentario($id)
	{
		$postComentario = $this->Model->getData("SELECT p.id, p.texto, p.imagem, p.id_usuario, p.dataPublicacao, u.nome, u.usuario, u.img FROM `publicacao` p, users u WHERE p.id_usuario = u.id AND p.id = " .$id);
		return $postComentario;
	}

	function buscarSeguidor($idPrincipal, $idSecundario) 
	{
		$buscarSeguidor = $this->Model->getData("SELECT COUNT(*) AS follow FROM seguidores WHERE idSeguidorPrincipal = " .$idPrincipal. " AND idSeguidorSecundario = " .$idSecundario);
		return $buscarSeguidor[0]['follow'];
	}

	function contarSeguidor($idSecundario) 
	{
		$contarSeguidor = $this->Model->getData("SELECT COUNT(*) AS qtdSeguidores FROM seguidores WHERE idSeguidorSecundario = " .$idSecundario);
		return $contarSeguidor[0]['qtdSeguidores'];
	}

	function contarLikes($idSecundario) 
	{
		$contarLike = $this->Model->getData("SELECT COUNT(*) AS qtdLikes FROM likes WHERE idPublicacao = " .$idSecundario);
		return $contarLike[0]['qtdLikes'];
	}

	function buscaUsuario($pesquisa)
	{
		$buscarUsuario = $this->Model->getData("SELECT * FROM users WHERE nome LIKE '%" .$pesquisa. "%' OR usuario LIKE '%" .$pesquisa. "%'");
		return $buscarUsuario;
	}

}