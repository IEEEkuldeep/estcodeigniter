<?php 


class Doctor extends CI_Controller 
{

    
    public function __construct() 
	{
        parent:: __construct();
        $this->load->model('UserModel');
        $this->load->helper('url');
    }


   

    function signup(){
        $this->load->View('doctor/login');
    }

    function dashboarddata($data){

    
        echo $this->session->user;       
        if(!$this->session->user){
            
        }
        else{

           
            $this->load->view("doctor/dashboard-d",$data);
        }
    
   
}

function login(){

 

                $this->load->library('form_validation');
        
                $this->form_validation->set_rules('email', 'Email is Required', 'required|min_length[5]|max_length[25]');
                $this->form_validation->set_rules('pass1', 'Password is required', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_message('required', 'Your %s');
        if ($this->form_validation->run() === FALSE)
        {  
            $this->session->set_flashdata('Login_failed','Invalid Username/Password');
            redirect("./Doctor/signup"); 
        }


     
     else{
        if($this->input->post('email')&&$this->input->post('pass1')){
             $this->form_validation->set_rules('email','Email','required | valid_email');
             $this->form_validation->set_rules('pass1', 'Password', 'required');


            $e=$this->input->post('email');
            $p=$this->input->post('pass1');
            $this->load->model('UserModel');
           
            $status="ACTIVE";
            $data['user_data'] = $this->UserModel->validateUser($e,$p,$status);   
            $this->session->set_userdata('user',TRUE);
            
        
            if($data['user_data']==0){

                $this->session->set_flashdata('Login_failed','Invalid Username/Password');
                redirect("./Doctor/signup"); 
            
            }
            else{

                     
$this->session->set_userdata('e', $e);
                    if (!$this->session->user)
                    {                     
                       
                        redirect(base_url()); 
                        
                    }
                    else{
                        
                        // echo !$this->session->e;
                         $this->dashboarddata($data);
                    }

            
            }
            
     }
         $this->session->set_flashdata('item','This field is required');   
           
     }
}

function logout(){
    
    $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
    $this->output->set_header('Pragma: no-cache');
        echo $this->session->user;
           echo  $this->session->unset_userdata('user');
       
           echo $this->session->user;
   
    
    redirect('Common');
    
     
    
    }

    public function getAppointmentDetails()
    {
        $doctoremail=$this->session->e;
        $this->load->model('DoctorModel');
        $getDoctorId=$this->DoctorModel->getDoctorId($doctoremail);
        // print_r($getDoctorId);
        // print_r($getDoctorId[0]);

         foreach ($getDoctorId as $key => $value) {
             $doctor_id=$value['doctorid'];
            
        }
        echo $doctor_id;
        $appointmentList = $this->DoctorModel->getAppointmentByDoctor($doctor_id);
       
        print_r($appointmentList);
        
        foreach ($appointmentList as $key => $value) {
    
           
            echo "<tr>";
           
            // echo "<td><img class='rounded-circle' style='width:40px;' src='/h4ind/assests/imagesimg/user/avatar-2.jpg' alt='activity-user'></td>";
            echo "<td>"."<h6 class='mb-1'>".$value['appointment_id']."</h6>";
            // $value['doctorid']."</h6>"
           
            echo "<td>"."<h6 class='mb-1'>".$value['appointment_patientname']."</h6>";
            echo "<td>"."<h6 class='mb-1'>".$value['status']."</h6>";
            echo "<td>"."<h6 class='mb-1'>".$value['appointment_sloatstimewithdate']."</h6>";
            // echo "<p class='mb-0'>".$value['appointment_status']."</p>"."</td>";
           
            
            echo "<td>"."<button type='button' class=' btn btn-danger btn-sm reject' data-reject='".$value['appointment_id']."'>Reject</button>"."</td>";
            echo "<td>"."<button type='button' class='btn btn-success btn-sm docstatus' data-approve='".$value['appointment_id']."'>Approve Request</button>"."</td>";
            
            // echo "<td>"."<input name='fname' type='button' class='textfield'  value=".$value['doctorid']." />"."</td>";
            echo "</tr>";
    
            
        }
    
    }

    public function ApprovePatientRequest(){
        $appointment_id=$this->input->post('approvereq');
        $this->load->model('DoctorModel');
        $appointstatus="approved";
        $res=$this->DoctorModel->updateAppointmentStatus($appointment_id,$appointstatus);
       
    }
    
    public function RejectPatientRequest(){
        $appointment_id=$this->input->post('approvereq');
        $this->load->model('DoctorModel');
        $appointstatus="Rejected";
        $res=$this->DoctorModel->updateAppointmentStatus($appointment_id,$appointstatus);
       
    }


    public function updateProfile(){

        $demail=$this->input->post('email');
        $fullname=$this->input->post('fullname');
        $specli=$this->input->post('specli');
        $gender=$this->input->post('gender');
        $experi=$this->input->post('experi');
        $starttime=$this->input->post('starttime');
        $endtime=$this->input->post('endtime');
        $interval=$this->input->post('interval');
        $data=$this->input->post('week');
        $weekdaysdata=implode(",",$data);
        
        
        $weekdaysdatafinal= substr($weekdaysdata,23);
        echo $weekdaysdatafinal;
       
        $street=$this->input->post('street');
        $city=$this->input->post('city');
        $district=$this->input->post('district');
        $state=$this->input->post('state');
        $zip=$this->input->post('zip');


        $this->load->model('DoctorModel');

        $res=$this->DoctorModel->updateDocProfile($demail,$fullname,$specli,$gender,$experi,$starttime,$endtime,$weekdaysdatafinal,$interval);
        $getDoctorId=$this->DoctorModel->getDoctorId($demail);

        foreach ($getDoctorId as $key => $value) {
        
        
        $doctorID=$value['doctorid'];
        
        
        
        
        
        }


        $resp['data']=$this->DoctorModel->updateDocAddress($doctorID,$street,$city,$district,$state,$zip);
        
        // $data = array(
        //     // 'addstreet'=>$street,
        //     // 'doccity'=>$city,
        //     // 'docdistrict'=>$district,
        //     // 'docstate'=>$state,
        //     // 'docpincode'=>$zip,
        //     'doctorid'=>$doctorID,
        // );
    
        // $this->db->insert('docaddress',$data);            
       
    }

    public function upload() 
	{
        if($email=$this->input->post('email')){
            $email=$this->input->post('email');
        }
         $this->load->model('DoctorModel');
              
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_pic')) 
		{
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            // $this->load->view('user/imageupload_form.php', $error);

        } 
		else 
		{
            $data = array('image_metadata' => $this->upload->data());
            
            // print_r($data['image_metadata']['full_path']);
            $d=$data['image_metadata']['full_path'];
            // echo "<pre>";
            $img=substr($d,23);

             print_r($img);

             $data['pic']= $this->DoctorModel->profilepic($email,$img);
            
            //   echo  $e = $this->session->e;
            //   echo $p = $this->session->p;
            //   $data['user_data'] = $this->UserModel->validateUser($e,$p);    
              // print_r($data['user_data']);


        //       if($data['user_data']==0){
  
        //    $this->session->sess_destroy();
        //      $this->session->sess_destroy();
               redirect(base_url());
      
        //       }
        //       else{
            // $this->load->view("doctor/dashboard-d");
                       
        //               if ($e||$p)
        //               {
        //                 $this->session->set_flashdata('pro','Profile update success');   
        //                   $this->dashboarddata($data);
        //               }
  
              
        //       }
              
        }
    }


   
}

?>