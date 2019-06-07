<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_keydam extends CI_Controller {
	public function __construct() 
	{
	parent::__construct();
	$this->load->helper('url');  // redirect
    }
	
/**
 * * * *
 * 電卓 *
 * * * *
 */
	public function index()
	{
		$this->load->view('keydam');
	}

	public function keydam_result()
	{
		$keydam = $this->input->get('keydam');
        try{
        echo eval('return '.$keydam.';');
        } catch ( Exception $ex ) {
            echo "ヤバいですね！";
        }
	}
}