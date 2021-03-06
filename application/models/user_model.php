<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return id of the user inserted, or FALSE in case of failure
     **/
    public function addNewUser($data) {
        if ($this->db->insert('user', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    
    public function updateUserData($user_id, $data){
        $this->db->where('user_id', $user_id);
        return $this->db->update('user', $data);
    }

    public function isNewUser() {
    	if ( $this->isLoggedIn() ) {
            $user = $this->getLoggedInUser();
            $this->db->select('new_user')->from('user')->where('user_id', $user->user_id); 
            return ($this->db->get()->row()->new_user == 0)?false:true;
           }
        return false;
    }
    public function getUserData($user_id) {
        $query = $this->db->get_where('user', array('user_id'=> $user_id)); 
        return $query->row();
    }
    
    public function getLoggedInUser(){
        $user = $this->session->userdata('user');
        return $this->getUserData($user->user_id);
    }
    
    public function userExists($twitter_user_id) {
        $query = $this->db->get_where('user', array('twitter_user_id'=> $twitter_user_id));
        return ($query->num_rows()>0)?$query->row()->user_id:false;
    }

    public function setFlash($message, $type="info") {
        $flash = array('message'=>$message);
        if( $type=='error' || $type=='notice' || $type=='success' || $type=='info' || $type=='warning' || $type=='danger' ) {
            if ( $type=='error' ) {
                $flash['class']     ='alert-danger';
                $flash['label']     ='¡Error!';
            } else if ( $type=='notice' ) {
                $flash['class']     ='alert-info';
                $flash['label']     ='Aviso';
            } else {
                $flash['class']     ='alert-'.$type;
                if($type=='info'){
                    $flash['label']     = 'Información';
                } else if($type=='success'){
                    $flash['label']     = '¡Éxito!';
                } else {
                    $flash['label']     = ucfirst($type).'!';
                }
            }
            $this->session->set_userdata('flash', $flash);
        }
        
    }
    
    public function getFlash($destroy=true) {
    	$flash = $this->session->userdata('flash');
    	if($destroy){
    		$this->session->unset_userdata('flash');
    	}
		return $flash;
    }

    public function isLoggedIn(){
        return ($this->session->userdata('user'))?true:false;
    }
    /**
     * Reset session data
     * @return  void
     */
    public function clearSession ()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('request_token');
        $this->session->unset_userdata('request_token_secret');
    }
}
