<?php

class Admin extends CI_Controller {

    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url');
        
    }


    public function index() 
	{
        redirect("/Doctor/signup");
    }

    function login(){
// echo "work";
        $this->load->view("admin/alogin");
    }

    function dashboarddata($data){

        // $data['user_data'][0]->cust_email;
        echo $this->session->e;       
        if(!$this->session->e){
            // $this->session->mark_as_temp('loginsuccess',5);
            // $this->session->mark_as_temp('loginsuccess',5,'login successfully')
            // $this->session->mark_as_flash('loginsuccess');
            //      $this->session->set_flashdata('loginsuccess', 'login successfully');          
                return redirect(base_url());
        // $this->load->view("doctor/dashboard-d",$data);
        }
        else{

            // echo isset($_SESSION['user']);

            // echo $_SESSION['user'];
            $this->load->view("admin/dashboard-a.php",$data);
        }
    }
    function alogin(){

        // $this->load->View("user/login.php",$data);
        //  $this->load->helper(array('form', 'url'));
    
                    // $this->load->library('form_validation');
            
                    $this->form_validation->set_rules('aemail', 'Email is Required', 'required|min_length[5]|max_length[25]');
                    $this->form_validation->set_rules('apass1', 'Password is required', 'required');
    
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            $this->form_validation->set_message('required', 'Your %s');
            if ($this->form_validation->run() === FALSE)
            {  
                $this->session->set_flashdata('Login_failed','Invalid Username/Password');
            redirect(base_url("./Admin/login"));
            }
    
    
         
         else{

            if($this->input->post('aemail')&&$this->input->post('apass1')){
                $this->form_validation->set_rules('email','Email','required | valid_email');
                $this->form_validation->set_rules('pass1', 'Password', 'required');
    
    
                $e=$this->input->post('aemail');
                $p=$this->input->post('apass1');
                $this->load->model('UserModel');
               
    
                $data['admin_data'] = $this->UserModel->validateAdmin($e,$p);   
                // $this->session->set_userdata('user',TRUE);
                print_r($data['admin_data']);
                if($data['admin_data']==0){
                    $this->session->set_flashdata('Login_failed','Invalid Username/Password');
                    redirect(base_url("./Admin/login"));
       
                }
                else{
    
                         
     echo $this->session->set_userdata('e', $e);
                        if (!$this->session->e)
                        {                   
                              $this->session->sess_destroy();  
                            echo "no Session";  
                            
                            
                        }
                        else{
                            
                            echo $this->session->e;
                           
                             $this->dashboarddata($data);
                        }
    
                
                }
                
         }
             $this->session->set_flashdata('item','This field is required');   
                
         }
    }
    

    public function fetchDatafromDatabase()
	{
        $this->load->model('AdminModel');
		$resultList = $this->AdminModel->fetchAllData();
		
		// $result = array();
		// $i = 1;
		foreach ($resultList as $key => $value) {

           
            echo "<tr>";
           
            echo "<td><img class='rounded-circle' style='width:40px;' src='/h4ind/assests/imagesimg/user/avatar-2.jpg' alt='activity-user'></td>";
            echo "<td>"."<h6 class='mb-1'>".$value['doctorlicence']."</h6>";
            echo "<td>"."<h6 class='mb-1'>".$value['doctoremail']."</h6>";
            echo "<p class='mb-0'>".$value['speclist']."</p>"."</td>";
           
            
            echo "<td>"."<button type='button' class=' btn btn-danger btn-sm delete' data-id='".$value['doctoremail']."'>Delete</button>"."</td>";
            echo "<td>"."<button type='button' class=' btn btn-success btn-sm docstatus' data-id='".$value['doctoremail']."'>".$value['doctorstatus']."</button>"."</td>";
            
           
            echo "</tr>";
			
		}
	
	}




  

    function deleterecords()
	{
		if($this->input->post('type')==2)
		{
			$id=$this->input->post('id');
            echo  $id;
            $this->load->model('AdminModel');
            $data=$this->AdminModel->deleteDoctor($id);	
           
			
		} 
	}

    function doctorstatus(){
        if($this->input->post('type')==2)
		{
			$id=$this->input->post('id');
            // echo  $id;

            $this->load->model('AdminModel');
            $data=$this->AdminModel->updateDocStatus($id);	
             $status=$data[0]->doctorstatus;
             
             if($status=="ACTIVE"){
                $active = array();
                $active['doctorstatus'] = "INACTIVE";
                $this->AdminModel->activeStatus($active,$id);
               
             }
             if($status=="INACTIVE"){
                $active = array();
                $active['doctorstatus'] = "ACTIVE";
                $this->AdminModel->activeStatus($active,$id);

             }
			
		} 
    }
  





    // function logout(){
    //     // session_destroy();
        
    //     //         $this->load->driver('cache');
    //     $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
    //     $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
    //     $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
    //     $this->output->set_header('Pragma: no-cache');
    //         echo $this->session->user;
    //            echo  $this->session->unset_userdata('user');
    //         //    echo $_SESSION['e'];
    //             //   unset($_SESSION['e']);
    //         //    echo $this->session->sess_destroy();
    //            echo $this->session->user;
    //     // $this->cache->clean();
        
    //     redirect('Common');
        
         
        
    //     }
    
    



}

?>