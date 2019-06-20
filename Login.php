<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('getmenu','url'));
		$this->load->library(array('session','form_validation'));
		//$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');
	}
	public function index(){
		$data['menu']= main_menu();
		$this->load->view('login',$data);
	}
	public function validate(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$config = array(
			array(
				'field' => 'email',
				'label' => 'Correo',
				'rules' => 'required|valid_email',
				'errors' => array(
					'requerid' => 'El %s. es requerido',
					'valid_email' => 'El formato de %s. es invalido'
				),
			),
			array(
				'field' => 'email',
				'label' => 'Correo',
				'rules' => 'required|valid_email',
				'errors' => array(
					'required' => 'El %s. es invalido',
				),
			),
		);
		$this->form_validation->set_rules($config);
	}
}
