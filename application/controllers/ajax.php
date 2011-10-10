<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

  var $json_data=Array(
    'error' => 1,
    'html' => 'Ajax Error: Invalid Request'
    );

  function __construct() {
    parent::Controller();
    $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
    $this->output->set_header('Expires: '.gmdate('D, d M Y H:i:s', time()).' GMT');
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  }

  function do_something() {
    $this->json_data['html'] = $this->load->view('menu', $_POST, true);
    $this->json_data['error'] = 0;
    $this->json_data['another_variable'] = 42;
  }

  function _output($output) {
    echo json_encode($this->json_data);
  }
  
}

/* End of file welcome.php */
/* Location: ./application/controllers/ajax.php */