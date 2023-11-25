<?php
/*
 *
 * @author Gabriel de Almeida
 */
class PublicCtl extends Controller
{
	public $data = [];
    private $model,$controller, $components;

	function __construct()
	{
		$this->model = new PublicModel();
		$this->ctl = new parent();
		$this->components = new Components();
		$this->routes = new Routes();
	}

    function Login() 
    {
        $data = [];
        return $data;
    }

    function Registrar() 
    {
        $data = [];
        return $data;
    }

    function EditarPerfil() 
    {
        $data = [];
        return $data;
    }

}