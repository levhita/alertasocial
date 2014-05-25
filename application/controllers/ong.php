<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ong extends CI_Controller {

	public function edit() {
		$user = $this->user_model->getLoggedInUser();
		$data = array(
			'user' => $this->user_model->getLoggedInUser(),
		);
		$this->layout->view('ong/edit', $data);
	}
	
	public function save() {
		if (!$this->user_model->isLoggedIn()) {
			//TODO: Send 403 error
			return;
		}
		$user = $this->user_model->getLoggedInUser();
		$data = array (
			'firstname' => $this->input->post('firstname'),
			'email' 	=> $this->input->post('email'),
			'description' 	=> $this->input->post('description'),
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
			$this->user_model->setFlash("Gracias por registrarte, espera mientrás el equipo de AvizorApp válida la autenticidad de tu colectivo para publicar alertas.", 'success');		
	    } else {
	    	$this->user_model->setFlash("Cambios guardados correctamente.", 'success');		
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