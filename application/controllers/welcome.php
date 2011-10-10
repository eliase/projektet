<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function index()
	{
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
	
	public function insert_account()
	{
		$data['name'] = $this->input->post('username');
		$data['pass'] = $this->input->post('password');
		$data['email'] = $this->input->post('email');
		$asd = $this->input->post('email2');
		
		date_default_timezone_set('Europe/Prague'); 
		$data['date'] = date('l jS F Y H:i:s');
		$data['ip'] = $this->input->ip_address();
		
		$this->load->model('Main_model');
		$this->Main_model->add_account($data);
	
		$menu_data['title'] = "Restaurant - create account";
		
		$this->load->view('menu', $menu_data);
		$this->load->view('insert_account', $data);
		$this->load->view('footer');
	}
	
	public function test()
	{
		$this->load->view('test');
	}
	
	function news()
	{
		//$this->db->where('rownum <', 4);
		$data['query'] = $this->db->get('restaurants', 3);
		//$data['query'] = $this->db->where('rownum <', 3);
		
		$menu_data['title'] = "Restaurant - News";
		
		$this->load->view('menu', $menu_data);
		$this->load->view('news_view',$data);
		$this->load->view('footer');
	}
	
	function browse_restaurants()
	{
		//setup the pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/welcome/browse_restaurants/';
		$config['total_rows'] = $this->db->count_all('restaurants');
		$config['per_page'] = '2';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		//$config['anchor_class'] = 'browse_restaurants';
		
		$this->pagination->initialize($config);
		//setup the pagination /
		
		
		//load the model and setup the table view
		$this->load->model('browse_restaurants_model');
		$data['results'] = $this->browse_restaurants_model->get_restaurants($config['per_page'],$this->uri->segment(3));
		
		$this->load->library('table');
		$this->table->set_heading('ID', 'Name', 'Author', 'Added', 'Address - Street', 'Address - Cipcode', 'Address - City', 'Opening Hours', '', '', '', '', 'Kitchen');
		//load the model and setup the table view /


		$data['query'] = $this->db->get('restaurants');
		$menu_data['title'] = 'Restaurant - Browse';


		//load the views
		$this->load->view('menu', $menu_data);
		$this->load->view('browse_restaurants_view', $data);
		$this->load->view('footer');
		//load the views /
	}
	
	function add_restaurant()
	{		
		$data['name'] = $this->input->post('name');
		$data['author'] = $this->input->post('author');
		$data['address_street'] = $this->input->post('address_street');
		$data['address_zipcode'] = $this->input->post('address_zipcode');
		$data['address_city'] = $this->input->post('address_city');
		$data['opening_hours'] = $this->input->post('opening_hours');
		$data['fastfood'] = $this->input->post('fastfood');
		$data['vegetarian'] = $this->input->post('vegetarian');
		$data['takeaway'] = $this->input->post('takeaway');
		$data['alcohol'] = $this->input->post('alcohol');
		$data['kitchen'] = $this->input->post('kitchen');
		
		//call for the model to evaluate and insert data into the database
		$this->load->model('add_restaurants_model');
		if($this->add_restaurants_model->add_restaurant($data))
			$data['msg'] = 'Restaurant "'.$data['name'].'" have been successfully added!';
		else
			$data['msg'] = 'A restaurant with the name '.$data['name'].' do already exists.';
			
			
		//load the views
		$this->load->view('menu', $menu_data);
		if($this->form_validatio->run() == false)
			$this->load->view('add_restaurant', $data);
		else
			redirect(site_url('browse_restaurants'), 'refresh');
		$this->load->view('footer');
		//load the views /
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */