<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->TPL = array();
        $this->uri_array = $this->uri->uri_to_assoc();
		$this->load->model('register_model');
    }	
	
	public function index()
	{
		if($_POST){
			if(array_key_exists('email', $_POST)) {
				if (strlen($_POST['email'])) {
					if(array_key_exists('agreement', $_POST)) {
						$ret = $this->register_model->register($_POST);
						if($ret == 0){
								/*Load external Controller*/
								$controller = "SendEmail";
								include($controller.'.php'); 
								$get = new $controller();
								$get->sendRegistrationEmail($_POST['email']);
								/*****************/
								
								redirect('/homepage/registered/');
						}
						else {
							$this->TPL['login_error'] = "Email již byl využit při registraci. Není možné se registrovat dvakrát stejným emailem.";
						}
					}
					else {
						$this->TPL['login_error'] = "Zaškrtněte souhlas se zpracováním osobních údajů.";
					}
				}
				else {
					$this->TPL['login_error'] = "Vyplňte svůj email.";
				}
			}
			else {
				$this->TPL['login_error'] = "Vyplňte svůj email.";
			}
		}
		
        $this->TPL["title"] = "Anglicky jako borec";
        $this->load->view('header', $this->TPL);
        $this->load->view('homepage', $this->TPL);
        //$this->load->view('footer', $this->TPL);
	}
	
	public function registered()
	{
        $this->TPL["title"] = "Anglicky jako borec";
        $this->load->view('header', $this->TPL);
        $this->load->view('registered', $this->TPL);
        //$this->load->view('footer', $this->TPL);
	}
}
