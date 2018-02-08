<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendEmail extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

	function sendRegistrationEmail($email) {
		$message=
		/************* ZDE MEZI UVOZOVKY DOPIS REGISTRACNI EMAIL V HTML ****************************/
		"
		
		<h1>Gratulujeme! Zasílame handbook zdarma!</h1>
		
		";
		/*******************************************************************************************/
		
		
		
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('info@anglickyjako.borec.cz', 'Anglicky jako borec');
		$this->email->to($email);

		$this->email->subject('Anglicky jako Borec | Váš Ebook zdarma!');
		$this->email->message($message);

		$this->email->send();
	}
}
