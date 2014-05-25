<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return id of the user inserted, or FALSE in case of failure
     **/
    public function subscribe($category_id, $user_id) {
        $query = $this->db->get_where('user_has_categories', array('category_id'=> $category_id, 'user_id'=>$user_id)); 
        if($query->row()){
            $this->db->delete('user_has_categories', array('category_id'=> $category_id, 'user_id'=>$user_id)); 
            return false;
        }
        $this->db->insert('user_has_categories', array('category_id'=> $category_id, 'user_id'=>$user_id));
        return true;
    }

    /**
     * @return 
     **/
    public function isSubscribed($category_id, $user_id) {
        $query = $this->db->get_where('user_has_categories', array('category_id'=> $category_id, 'user_id'=>$user_id)); 
        return ($query->row())?true:false;
    }

    /**
     * @return id of the user inserted, or FALSE in case of failure
     **/
    public function add($data) {
        if ($this->db->insert('category', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    
    public function update($category_id, $data){
        $this->db->where('category_id', $category_id);
        return $this->db->update('category', $data);
    }
    
    public function get($category_id) {
        $query = $this->db->get_where('category', array('category_id'=> $category_id)); 
        return $query->row();
    }
    
    public function getAll() {
        $query = $this->db->get('category');
        $categories = array();
        foreach ($query->result_array() as $row) {
            $categories[] = $row;
        }
        return $categories;
    }

    public function getByPrettyURL($pretty_url) {
        $query = $this->db->get_where('campaign', array('pretty_url'=> $pretty_url)); 
        return $query->row();
    }
}
