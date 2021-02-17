<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Daftar_Resep/list');
	}

  public function Batagor()
	{
		$this->load->view('Daftar_Resep/batagor');
	}

  public function buburmanado()
	{
		$this->load->view('Daftar_Resep/buburmanado');
	}

  public function keraktelur()
	{
		$this->load->view('Daftar_Resep/keraktelur');
	}

  public function laksa()
	{
		$this->load->view('Daftar_Resep/laksa');
	}

  public function palbas()
	{
		$this->load->view('Daftar_Resep/pallubasa');
	}

  public function rawon()
	{
		$this->load->view('Daftar_Resep/rawon');
	}

  public function rendang()
	{
		$this->load->view('Daftar_Resep/rendang');
	}

  public function sopkonro()
	{
		$this->load->view('Daftar_Resep/sopkonro');
	}

  public function sotobanjar()
	{
		$this->load->view('Daftar_Resep/sotobanjar');
	}

  public function sotopadang()
	{
		$this->load->view('Daftar_Resep/sotopadang');
	}

  public function tahutek()
	{
		$this->load->view('Daftar_Resep/tahutek');
	}

}
