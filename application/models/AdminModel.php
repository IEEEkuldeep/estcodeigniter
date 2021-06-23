<?php

class AdminModel extends CI_Model{

    public function fetchAllData()
	{
		$this->db->select('*');
        $this->db->from('doctorsignup');
        $this->db->order_by('doctorid','desc');
        $query = $this->db->get();
	
         return $query->result_array();
	}

    
    function deleteDoctor(){
		$id=$this->input->post('id');
		$this->db->where('doctoremail', $id);
		$result=$this->db->delete('doctorsignup');
		return $result;
	}	
	function updateDocStatus(){
		$id=$this->input->post('id');
		$this->db->select('*');
         $this->db->from('doctorsignup');
		 $this->db->where('doctoremail', $id);
		 $query = $this->db->get()->result();
		// $result=$this->db->get('doctorsignup');
		return $query;
	}
	
	public function activeStatus($active,$docemail) {

		$this->db->where('doctoremail', $docemail);
		$this->db->update('doctorsignup', $active);
	
		return;
	}


}


?>