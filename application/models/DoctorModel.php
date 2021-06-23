<?php

class DoctorModel extends CI_Model{


    public function getDoctorId($doctoremail){
        $this->db->select('*');
             $this->db->from('doctorsignup');
        	 $this->db->where('doctoremail', $doctoremail);
        	 $query = $this->db->get()->result_array();
        	return $query;

    }
    public function getDoctorIdEmail($doctoremail){
        $this->db->select('*');
             $this->db->from('doctorsignup');
        	 $this->db->where('doctoremail', $doctoremail);
        	 $query = $this->db->get()->result();
        	return $query;

    }

    public function getAppointmentByDoctor($doctor_id)
	{
        $this->db->select('*');
        $this->db->from('appointment');
        $this->db->where('doctorid', $doctor_id);
        $query = $this->db->get()->result_array();
       return $query;
        //         $this->db->select('*');
        // $this->db->from('appointment');
        // $this->db->order_by('doctorid','desc');
        // $query = $this->db->get();
	
        //  return $query->result_array();
	}

    public function updatePassword($email,$hashed_password){
        $this->db->set('doctorpass', $hashed_password);
        $this->db->where('doctoremail', $email);
        $result=$this->db->update('doctorsignup');
        return $result;
    }

    public function updateAppointmentStatus($appointment_id,$appointstatus){
        $this->db->set('status', $appointstatus);
        $this->db->where('appointment_id', $appointment_id);
        $result=$this->db->update('appointment');
        return $result;
    }


    function updateDocProfile($demail,$fullname,$specli,$gender,$experi,$starttime,$endtime,$days,$interval){
      
        $this->db->set('doctorname', $fullname);
        $this->db->set('speclist', $specli);
        $this->db->set('gender', $gender);
        $this->db->set('doctorexperience', $experi);
        $this->db->set('starttime', $starttime);
        $this->db->set('endtime', $endtime);
        $this->db->set('days', $days);
        $this->db->set('interval', $interval);
        $this->db->where('doctoremail', $demail);
        $result=$this->db->update('doctorsignup');
        return $result;

    }

    function updateDocAddress($doctorID,$street,$city,$district,$state,$zip){
        
        $this->db->set('street', $street);
        $this->db->set('city', $city);
        $this->db->set('district', $district);
        $this->db->set('state', $state);
        $this->db->set('pincode', $zip);
        $this->db->where('doctorid', $doctorID);
        $result=$this->db->update('doctorsignup');
        return $result;

    }

    function profilepic($demail,$img){
        
        $this->db->set('doctorprofilepic', $img);
        $this->db->where('doctoremail', $demail);
        $result=$this->db->update('doctorsignup');
        return $result;


            //     $this->db->where('cust_email', $e);
            //    $query = $this->db->get('customer');

            //       foreach ($query->result() as $row)
            //       {
            //         $pwd = $row->cust_password;
            //          $email = $row->cust_email;
            //          $user=$row->roleid;

                      
            //    }
            //    if($e===$email){

            //       $appointment_id = $e;
            //       $appointment = array('cust_profile_img' => $img);    
            //       $this->db->where('cust_email', $appointment_id);
            //       $this->db->update('customer', $appointment); 

            //       return true;
            //    }
            //    else{
            //       return $e.$email;
            //    }
               
               

            }


	// function updateDocStatus(){
	// 	$id=$this->input->post('id');
	// 	$this->db->select('*');
    //      $this->db->from('doctorsignup');
	// 	 $this->db->where('doctoremail', $id);
	// 	 $query = $this->db->get()->result();
	// 	// $result=$this->db->get('doctorsignup');
	// 	return $query;
	// }
	// public function bookAppointment($data){
	// 	$this->db->insert('appointment', $data);

	// }
	
	

}


?>