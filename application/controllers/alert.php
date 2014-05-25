<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alert extends CI_Controller {

	public function edit()
	{
		
		if (!$this->user_model->isLoggedIn()) {
			$this->user_model->setFlash("Necesitas iniciar sesión para publicar una alerta", 'error');
			redirect(base_url('/'));
			return;
		}
		$alert_id = $this->uri->segment(3);
		$user = $this->user_model->getLoggedInUser();
		if(!empty($alert_id)){
			$alert = $this->alert_model->get($alert_id);
			if (!$alert) {
				echo "//TODO: send badrequest error campaign doesn't exist";
				return;
			} 
			if ($alert->user_id != $user->user_id) {
				echo "//TODO: Send 403 no permission";
				return;
			}
		} else {
			$alert = (object)array(
				'alert_id' => 0,
				'title'=>'',
				'content'=>'',
				'action_link' => ''
			);
		}
		
		
		$data = array(
			'alert' => $alert
		);
		$this->layout->view('alert/edit', $data);
	}
	
	public function save(){
		if (!$this->user_model->isLoggedIn()) {
			return;
		}
		$user = $this->user_model->getLoggedInUser();
		$data = array (
			'user_id' => $user->user_id,
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'action_link' => $this->input->post('action_link'),
		);
		$data = $this->security->xss_clean($data);

		$alert_id = (int)$this->input->post('alert_id');
		
		if ($alert_id!==0) {
			$alert = $this->alert_model->get($alert_id);
			if (!$alert) {
				echo "//TODO: send badrequest error campaign doesn't exist";
				return;
			} 
			if ($alert->user_id != $user->user_id) {
				echo "//TODO: Send 403 no permission";
				return;
			}
			$this->alert_model->update($alert_id, $data);
		} else {
			if (!$alert_id = $this->alert_model->add($data)){
				echo "//TODO: error creating campaign";
				return;
			}
		}
		header('Content-type: application/json');
		header('HTTP/1.1 200 OK');
		echo json_encode(array(
			'status' => true,
			'alert' => (array)$this->alert_model->get($alert_id),
		));
	}
	
	public function view() {
		if(!$campaign = $this->campaign_model->getByPrettyURL($this->uri->segment(2))) {
			$this->user_model->setFlash("That Campaign doesn't exists", 'error');
			redirect(base_url('/'));
		}	
		
		$data = array();
		$data['campaign'] = $campaign;
		
		if ($this->user_model->isLoggedIn()) {
			$user = $this->user_model->getLoggedInUser();
			$data['is_owner'] = ($user->user_id==$campaign->user_id);
		} else {
			if($pending_campaign_id = $this->session->userdata('pending_campaign_id')){
				$data['pending_campaign_id'] = $pending_campaign_id;
				$data['is_owner'] = ($campaign->campaign_id==$pending_campaign_id);
			} else {
				$data['is_owner'] = false;
			}
		}
		
		
		$this->layout->view('campaign/view', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */