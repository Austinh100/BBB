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
        $data['seven'] = $this->user->getFbProfilePic();

		if($data["loggedIn"]){
            $data['friends'] = $this->user->getFriendsList();
			$data['name'] = $this->user->getName();
			$this->load->view('home',$data);
		}else{
			$this->load->view('index',$data);
		}

	}
	
	public function result($user)
	{
		//Get data for $user and pass it to the result view:
		$data = "";
		$this->load->view('result',$data);
	}
	
}
