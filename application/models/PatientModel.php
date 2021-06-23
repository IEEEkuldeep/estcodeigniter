<?php

class PatientModel extends CI_Model{

    public function fetchAllData()
	{
    	 $this->db->select('*');
		
        $this->db->from('doctorsignup');
		// $this->db->join('appointment', 'appointment.doctorid = doctorsignup.doctorid');
		$this->db->where('doctorstatus',"ACTIVE");
        $this->db->order_by('doctorid','desc');
        $query = $this->db->get();
	
         return $query->result_array();
	}

	function getAppointStatus($did){
		
		$this->db->select('appointment_status');
         $this->db->from('appointment');
		 $this->db->where('doctorid', $did);
		 $query = $this->db->get()->result();
		// $result=$this->db->get('doctorsignup');
		return $query;
	}
	public function bookAppointment($data){
		$this->db->insert('appointment', $data);

	}

	public function updatePatientPassword ($email,$hashed_password){
        $this->db->set('patientpass', $hashed_password);
        $this->db->where('patientemail', $email);
        $result=$this->db->update('patientsignup');
        return $result;
	}

	public function patientProfile($patientemail,$fullname,$contact,$gender,$street,$city,$state,$pincode){

		$this->db->set('patientname', $fullname);
		$this->db->set('contact', $contact);
		$this->db->set('street', $street);
		$this->db->set('city', $city);
		$this->db->set('state', $state);
		$this->db->set('pincode', $pincode);
		$this->db->set('gender', $gender);
    
        $this->db->where('patientemail', $patientemail);
        $result=$this->db->update('patientsignup');
        return $result;

	}

	public function fetchAllPatients($patientemail)
	{
    	 $this->db->select('*');
		
        $this->db->from('patientsignup');
		// $this->db->join('appointment', 'appointment.doctorid = doctorsignup.doctorid');
		$this->db->where('patientemail',$patientemail);
        // $this->db->order_by('doctorid','desc');
        $query = $this->db->get();
	
         return $query->result();
	}

	public function fetchNotifications($id)
	{
		$multipleWhere = ['status =' => "approved", 'appointment_patientname =' => $id];
    	 $this->db->select('*');
		
        $this->db->from('appointment');
		$this->db->join('doctorsignup', 'appointment.doctorid = doctorsignup.doctorid');
		// $this->db->where('status',);
		$this->db->where($multipleWhere);
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get();
	
         return $query->result_array();
	}
	public function fetchBookedData($doctorid)
	{

		$multipleWhere = ['status =' => "approved",'doctorid='=> $doctorid];
    	 $this->db->select('*');
		
        $this->db->from('appointment');
		// $this->db->join('doctorsignup', 'appointment.doctorid = doctorsignup.doctorid');
		// $this->db->where('s',);
		$this->db->where($multipleWhere);
        $this->db->order_by('appointment_id','desc');
        $query = $this->db->get();
	
         return $query->result_array();
	}


	function profilepic($pemail,$img){
        
        $this->db->set('patientimage', $img);
        $this->db->where('patientemail', $pemail);
        $result=$this->db->update('patientsignup');
        return $result;

}
	

}


?>