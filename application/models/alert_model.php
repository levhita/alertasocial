<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alert_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return id of the user inserted, or FALSE in case of failure
     **/
    public function add($data) {
        if ($this->db->insert('alert', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    
    public function update($alert_id, $data){
        $this->db->where('alert_id', $alert_id);
        return $this->db->update('alert', $data);
    }
    
    public function get($alert_id) {
        $query = $this->db->get_where('alert', array('alert_id'=> $alert_id)); 
        return $query->row();
    }
}
