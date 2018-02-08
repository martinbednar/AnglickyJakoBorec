<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->TPL = array();
        $this->uri_array = $this->uri->uri_to_assoc();
    }

	public function index()
	{
        $this->TPL["title"] = "Anglicky jako borec";
        //$this->load->view('header', $this->TPL);
        $this->load->view('homepage', $this->TPL);
        //$this->load->view('footer', $this->TPL);
	}
}
