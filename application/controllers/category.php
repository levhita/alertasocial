<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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

	
	
	public function subscribe()
	{
		if (!$this->user_model->isLoggedIn()) {
			header('HTTP/1.1 403 Forbbiden');
			die();
		}
		$user = $this->user_model->getLoggedInUser();
		$category_id = $this->input->post('category_id');
		$result = $this->category_model->subscribe($category_id, $user->user_id);
		
		header('Content-type: application/json');
		header('HTTP/1.1 200 OK');
		echo json_encode(array('subscribe'=>$result));
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */