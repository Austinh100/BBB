<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('fbapi');
        $this->load->model('user');
    }

	public function index()
	{
        $data['logURL'] = $this->user->logURL();
        $data['loggedIn'] = $this->user->loggedIn();
		$this->load->view('index',$data);

	}
}
