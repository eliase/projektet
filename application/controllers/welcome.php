<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$name = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$menu_data['title'] = "Restaurant";
		$this->load->view('menu', $menu_data);
		$this->load->view('welcome_body');
		$this->load->view('footer');
	}
	
	public function create_account()
	{
		$menu_data['title'] = "Restaurant - create account";
		$this->load->view('menu', $menu_data);
		$this->load->view('create_account');
		$this->load->view('footer');
	}
	
	public function login()
	{
		$menu_data['title'] = "Restaurant - login";
		$this->load->view('menu', $menu_data);
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function insert_account($name, $pass, $email)
	{
		/*$data['name'] = $this->input->post('username');
		$data['pass'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');*/
		
		$data['name'] = $name;
		$data['pass'] = $pass;
		$data['email'] = $email;
		
		date_default_timezone_set('Europe/Prague'); 
		$data['date'] = date('l jS F Y H:i:s');
		$data['ip'] = $this->input->ip_address();
		
		$this->load->model('Main_model');
		$this->Main_model->add_account($data);
	
		/*$menu_data['title'] = "Restaurant - create account";
		
		$this->load->view('menu', $menu_data);
		$this->load->view('insert_account', $data);
		$this->load->view('footer');*/
	}
	
	public function test()
	{
		$this->load->view('test');
	}
	
	public function check_username()
	{
		$data['name'] = $this->input->post('name');
		
		if(!preg_match('/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/', $data['name']))
		{
			echo "letter";
			return false;
		}
		else{
			echo "ok";
			return true;
		}
		
		
	}
	
	public function check_password()
	{
		$data['pass'] = $this->input->post('pass');
		
		if(strlen($data['pass']) < 4)
		{
			echo "length";
			return false;
		}
		else{
			echo "ok";
			return true;
		}
		
	}
	
	public function check_email()
	{
		$data['email'] = $this->input->post('email');
		
		if(!preg_match('/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $data['email']))
		{
			echo "error";
			return false;
		}
		else{
			echo "ok";
			return true;
		}
		
	}
	
	public function check_account_form()
	{
		$data['name'] = $this->input->post('name');
		$data['pass'] = $this->input->post('pass');
		$data['email'] = $this->input->post('email');
		
		if(preg_match('/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/', $data['name']))
		{
			if(strlen($data['pass']) > 3)
			{
				if(preg_match('/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $data['email']))
				{
					//insert_account($data['name'], $data['pass'], $data['email']);
					$data['name'] = $data['name'];
					$data['pass'] = $data['pass'];
					$data['email'] = $data['email'];
					
					date_default_timezone_set('Europe/Prague'); 
					$data['date'] = date('l jS F Y H:i:s');
					$data['ip'] = $this->input->ip_address();
					
					$this->load->model('Main_model');
					$this->Main_model->add_account($data);
					
					$menu_data['title'] = "Restaurant - create account";
					$woot = $this->load->view('insert_account', $data, TRUE);
		
					echo "fine";
				}
			}
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */