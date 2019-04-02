<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;

class HomeController extends Controller 
{
	public function index()
	{
		echo 'Metodo: '.$this->getMethod()."\n";
		$this->returnJson($this->getRequestData());
	}
}