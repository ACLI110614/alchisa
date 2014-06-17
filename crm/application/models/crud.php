<?php

/* 
 * created alfie chiong
 * email alfiechiong@gmail.com
 */

 
class crud extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($data){
    
        $this->db->select((empty($data['fields']) ? '*' : $data['fields']));
        $this->db->from($data['tablename']);
       // $this->db->limit($data['limits["perpage"]'],$data['limits["start"]']);
       if(!empty($data['where'])){
       $this->db->where($data['where']);
      }
       
        
        $query = $this->db->get();
        
        //$result =  !$one  ? $query->result($array) : $query->row() ;
        return $query->result();
    }
    
    
        function insert($data){

        $this->db->insert($data['tablename'],$data['fields']);         
        if ($this->db->affected_rows() == '1')
		{
		return TRUE;
		}
		return FALSE;       
    }
    
     function update($data){
        $this->db->where($data['where']);
        $this->db->update($data['tablename'],$data['data']);
        if ($this->db->affected_rows() >= 0)
		{
		return TRUE;
		}
		return FALSE;       
    }
    
    function delete($data){
     
        $this->db->where($data['where']);
        $this->db->delete($data['tablename']);
        if ($this->db->affected_rows() == '1')
		{
		return TRUE;
		}
		
		return FALSE;        
    }   
   /* 
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}
  
    */
}