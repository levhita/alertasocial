<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber extends CI_Controller {

	public function edit() {
		$user = $this->user_model->getLoggedInUser();
		$categories = $this->category_model->getAll();
		$categories_rich =array();
		foreach($categories AS $category) {
			$category['is_subscribed'] = $this->category_model->isSubscribed($category['category_id'], $user->user_id);
			$categories_rich[]=$category;
		}
		$data = array(
			'user' => $this->user_model->getLoggedInUser(),
			'categories' => $categories_rich
		);
		$this->layout->view('subscriber/edit', $data);
	}
	
	public function save() {
		if (!$this->user_model->isLoggedIn()) {
			//TODO: Send 403 error
			return;
		}
		$user = $this->user_model->getLoggedInUser();
		$data = array (
			'firstname' => $this->input->post('firstname'),
			'lastname' 	=> $this->input->post('lastname'),
			'email' 	=> $this->input->post('email'),
			'new_user'	=> '0'
		);
		$data = $this->security->xss_clean($data);
    	$this->db->where('user_id', $user->user_id);
    	if(!$this->db->update('user', $data)){
    		header('Content-type: application/json');
			header('HTTP/1.1 500 OK');
			echo json_encode(array(
				'status' => false
			));
			die();
		}
		
		if($this->input->post('new_user')=='1'){
			$this->user_model->setFlash("¡Gracias por registrarte!, Ahora recibirás las notificaciones en tu cuenta de twitter.", 'success');		
	    } else {
	    	$this->user_model->setFlash("Cambio guardados correctamente.", 'success');		
	    }
	    
	    header('Content-type: application/json');
		header('HTTP/1.1 200 OK');
		echo json_encode(array(
			'status' => true
		));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */