<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    function register($post)
    {
		/*check if email is already registered*/
		$this->db->from('Customer');
        $this->db->where("Customer.email", $post['email']);
        $q = $this->db->get();
		
		if(count($q->result_array()) == 0) {
			/*if ($post['agreement'] == true) {
				$post['agreement'] = 1;
			}
			else {
				$post['agreement'] = 0;
			}*/
			
			$customer = array('email' => $post['email'], 'agreement' => $post['agreement'], 'registered' => date('Y-m-d H:i:s', time()));
			
			$this->db->insert('Customer', $customer);
			
			return 0;
		}
        else {
			return 1;
		}
    }
}