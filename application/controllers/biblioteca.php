<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biblioteca extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Biblioteca_model', 'biblioteca');
	}
	
	public function index()
	{	
		$data['info_bd'] = $this->biblioteca->obtener_fecha_actualizacion();
		
		$autor = trim($this->input->get('autor', TRUE));
		$titulo = trim($this->input->get('titulo', TRUE));
		$editorial = trim($this->input->get('editorial', TRUE));
		$isbn = trim($this->input->get('isbn', TRUE));
		
		$data['buscar'] = false;
		
		if (strlen($autor) > 3 || strlen($titulo) > 3 || strlen($editorial) > 3 || strlen($isbn) > 3) {
			$data['buscar'] = true;
			$data['libros'] = $this->biblioteca->obtener_listado_libros($autor, $titulo, $editorial, $isbn);
		}
		
		$data['template']['top'] = 0;
		$data['template']['bottom'] = 1;
		
		$data['titulo'] = 'Fondos de la Biblioteca';
		$data['view'] = 'biblioteca';
		$this->load->view('templates/template', $data);
	}
}

/* End of file biblioteca.php */
/* Location: ./application/controllers/biblioteca.php */