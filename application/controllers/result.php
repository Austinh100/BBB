<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('fbapi');
        $this->load->model('user');
    }

	public function index($user)
	{
		//Retrieve the specific data for the facebook user and pass it to the result view.
		$data = "Do this";
		$this->load->view('result', $data);
	}
}
