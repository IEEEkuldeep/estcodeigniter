<?php 


class Patient extends CI_Controller 
{

    
    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url');
    }


    // public function index() 
	// {
    //     $this->load->view('doctor/dashboard-d');
    // }

    function signup(){
        $this->load->View('patient/login');
    }

    function dashboarddata($data){

        // $data['user_data'][0]->cust_email;
        echo $this->session->user;       
        if(!$this->session->user){
            // $this->session->mark_as_temp('loginsuccess',5);
            // $this->session->mark_as_temp('loginsuccess',5,'login successfully')
            // $this->session->mark_as_flash('loginsuccess');
            //      $this->session->set_flashdata('loginsuccess', 'login successfully');          
                // return redirect(base_url());
        // $this->load->view("doctor/dashboard-d",$data);
        }
        else{

            // echo isset($_SESSION['user']);

            // echo $_SESSION['user'];
            $this->load->view("patient/dashboard-p",$data);
        }
    
    // print_r($data['user_data'][0]->doctoremail);
}

function login(){

    // $this->load->View("user/login.php",$data);
    //  $this->load->helper(array('form', 'url'));

                // $this->load->library('form_validation');
        
                $this->form_validation->set_rules('email', 'Email is Required', 'required|min_length[5]|max_length[25]');
                $this->form_validation->set_rules('pass1', 'Password is required', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_message('required', 'Your %s');
        if ($this->form_validation->run() === FALSE)
        {  
            $this->session->set_flashdata('Login_failed','Invalid Username/Password');
            redirect(base_url("./Patient/alogin"));
        }


     
     else{
        if($this->input->post('email')&&$this->input->post('pass1')){
            // $this->form_validation->set_rules('email','Email','required | valid_email');
            // $this->form_validation->set_rules('pass1', 'Password', 'required');


            $e=$this->input->post('email');
            $p=$this->input->post('pass1');
            $this->load->model('UserModel');
            //  $this->session->set_userdata('e', $e);
            //  $this->session->set_userdata('p',$p);
            //   $this->session->e;

            $data['user_data'] = $this->UserModel->validatePatient($e,$p);   
            $this->session->set_userdata('user',TRUE);
            // print_r($data['user_data']);
            if($data['user_data']==0){
                $this->session->set_flashdata('Login_failed','Invalid Username/Password');
                redirect(base_url("./Patient/alogin"));
    
            }
            else{
// $this->load->views('user/dashboard.php');
                     
$this->session->set_userdata('e', $e);
                    if (!$this->session->user)
                    {                     
                        // echo $this->session->e;  
                        redirect(base_url()); 
                        
                    }
                    else{
                        
                        // echo !$this->session->e;
                         $this->dashboarddata($data);
                    }

            
            }
            
     }
         $this->session->set_flashdata('item','This field is required');   
            // $this->load->View("user/login.php");  
     }
}


public function fetchDatafromDatabase()
{
    $this->load->model('PatientModel');
    $resultList = $this->PatientModel->fetchAllData();

    
    $this->load->model('PatientModel');
   
   

    // echo "<pre>";
// print_r($bookedetails['0']);
   
//  print_r($resultList);

    foreach ($resultList as $key => $value) {
           
     
                    $doctorid=$value['doctorid'];
        $bookedetails = $this->PatientModel->fetchBookedData($doctorid);
        echo "<tr>";
       


       
        // echo "<td><img class='rounded-circle' style='width:40px;' src='/h4ind/assests/imagesimg/user/avatar-2.jpg' alt='activity-user'></td>";
        echo "<td><img class='rounded-circle' style='width:100px;' src='".base_url().$value['doctorprofilepic']."'></td>";
        echo "<td>"."<h6 class='mb-1'>".$value['doctorlicence']."</h6>";

     $starttime=$value['starttime'];
     $endtime=$value['endtime'];
     $interval=$value['interval'];

                //  $startt=substr($starttime, 0, 2);
                //  $endt=substr($endtime, 0, 2);
                // //  echo $st=;
                //  $hours=(int)$endt-(int)$startt;

                //  $minute = $hours*60;
                //   $end = $minute/15;



                $start_times = $starttime;  //start time as string
                $end_times = $endtime;  //end time as string
                $s = strtotime($start_times);
                $st=date('Y-m-d H:i:s', $s);

                // echo $start=date('h:i', $s);
                $e = strtotime($end_times);
                $en=date('Y-m-d H:i:s', $e);

                //  echo $end=date('h:i', $e);




                // $start_time = '2015-10-21 09:00:00';  //start time as string
                // $end_time = '2015-10-21 19:45:00';  //end time as string

                $start_time = $st;  //start time as string
                $end_time = $en;  //end time as string
                $booked = array('13:20-13:40','14:00-14:20');    //booked slots as arrays
                $start = DateTime::createFromFormat('Y-m-d H:i:s',$start_time);  //create date time objects
                $end = DateTime::createFromFormat('Y-m-d H:i:s',$end_time);  //create date time objects
                $count = 0;  //number of slots
                $out = array();   //array of slots 
                for($i = $start; $i<$end;)  //for loop 
                {
                $avoid = false;   //booked slot?
                $time1 = $i->format('H:i');   //take hour and minute
                $i->modify($interval);      //add 20 minutes
                $time2 = $i->format('H:i');     //take hour and minute
                $slot = $time1."-".$time2;      //create a format 12:40-13:00 etc
                    for($k=0;$k<sizeof($booked);$k++)  //if booked hour
                    {
                    if($booked[$k] == $slot)  //check
                    $avoid = true;   //yes. booked
                    }
                if(!$avoid && $i<$end)  //if not booked and less than end time
                {
                $count++;           //add count
                $slots = ['start'=>$time1, 'stop'=>$time2];         //add count
                array_push($out,$slots); //add slot to array
                }
                }

                // echo "<pre>";
                // print_r($out);
                // var_dump($out);   //array out
                // echo $count ." Available  slots ";
                // echo " AFT  slots ";
                echo"<br>";

                // $counter=0;




                 $shifilterdata1 = array();
                foreach ($out as $keys => $data) {

                    $shifilter = $data['start'];


                   
                    // echo $shift=substr($shifilter, 0, 2);
                    
                    // echo "<small>"."<button type='button'  class='btn-sm btn-outline-dark m-1 button1' data-start='".$data['start']."'  >".$data['start']."</button>"."</small>";
                    // $counter++;
                    // if($counter==7){
                    //     echo"<br>";
                    //     $counter=0;
                    // }
                
                
                 array_push($shifilterdata1,$shifilter);

                    
                }

                

              
                $bookeddata = array();
                foreach ($bookedetails as $key => $booked) {
    
                     $getBookTime=$booked['appointment_sloatstimewithdate'];
                    //  echo "<br>";
                     $getDoctorid=$booked['doctorid'];

                   
                    $getBookedTimeData=substr($getBookTime,0, 5); 
                  array_push($bookeddata,$getBookedTimeData);
                        }

                        // print_r($shifilterdata1);
                        

                        sort($shifilterdata1);
                        sort($bookeddata);
                       

              
                  $finalsloats =array_diff($shifilterdata1,$bookeddata);

                  date_default_timezone_set('Asia/Kolkata');

                  $counter=0;
                  
                  foreach ($finalsloats as $keys => $dataValuetime) {
                    $currentTime = date('H:i');

                    $finalcurrentTime = str_replace(':', '', $currentTime);
                 $finalSloatsdata = str_replace(':', '', $dataValuetime);

                    // echo $tm=DateTime::createFromFormat('H:i',$dataValuetime);
                    // $tm=11';

                   
                    $counter++;
                    if($counter==7){
                        echo"<br>";
                        $counter=0;
                    }
                


                    if($currentTime < $finalSloatsdata){
                        
                        echo "<small>"."<button type='button'  class='btn-sm btn-outline-dark m-1 button1' data-start='".$dataValuetime."'  >".$dataValuetime."</button>"."</small>";
                    }
                  
                   
                
                
                }

                    

                   
                    // print_r($finalsloats);
                    // $counter=0;

                    foreach ($finalsloats as $keys => $dataValue) {

                        
    
    
                       
                        // echo $shift=substr($shifilter, 0, 2);
                        
                        // echo "<small>"."<button type='button'  class='btn-sm btn-outline-dark m-1 button1' data-start='".$dataValue."'  >".$dataValue."</button>"."</small>";
                        // $counter++;
                        // if($counter==7){
                        //     echo"<br>";
                        //     $counter=0;
                        // }
                    
                    
                     
    
                        
                    }
                   
                        

                    // echo "<p class='mb-0'>".$value['starttime']."</p>"."</td>";
                        // echo "<td>"."<h6 class='mb-1'>".$value['endtime']."</h6>";
                        
                        // $value['doctorid']."</h6>"
                        
                        echo "<td>"."<h6 class='mb-1'>".$value['doctoremail']."</h6>";
                        echo "<p class='mb-0'>".$value['speclist']."</p>"."</td>";
                        
                        
                        // print_r($value);
                        // echo "<td>"."<button type='button' class=' btn btn-danger btn-sm delete' data-id='".$value['doctoremail']."'>Delete</button>"."</td>";
                        echo "<td>"."<button type='button' class='btn btn-outline-success btn-sm docstatus' data-id='".$value['doctorid']."'>Book Appointment</button>"."</td>";
                    
                        
                        // echo "<td>"."<input name='fname' type='button' class='textfield'  value=".$value['doctorid']." />"."</td>";
                        echo "</tr>";
                        // $did=$value[doctorid]; 


                        

            }

                   

    // print_r($starttime);
    // $endtime;

    // $appointStatus=$this->PatientModel->getAppointStatus($did);

    // print_r($did);
    // print_r($appointStatus);
}

public function appointmentRequest(){
    if($this->input->post('type')==2)
    {
        $this->load->library('session');
        $sloattime=$this->input->post('sloattime');

        $this->session->set_userdata('sloats',$sloattime);
        // echo $sloat=$this->session->sloattime;


        echo $sloattime."DoctorSloat";

        echo $patientemail=$this->session->e;
        
        // $status="PENDING";
        // $data = array(
            // 'doctorid' => $id,
            // 'appointment_patientname' => $patientemail,
            // 'appointment_status' => $status
            // );
            // //Transfering data to Model
            // $this->load->model('PatientModel');
            // $this->PatientModel->bookAppointment($data);
            // $data['message'] = 'Data Inserted Successfully';
        
        // $data=$this->PatientModel->bookAppointment();	
        // $data=$this->AdminModel->updateDocStatus($id);	
        //  $status=$data[0]->doctorstatus;
         
        //  if($status=="ACTIVE"){
        //     $active = array();
        //     $active['doctorstatus'] = "INACTIVE";
        //     $this->AdminModel->activeStatus($active,$id);
           
        //  }
        //  if($status=="INACTIVE"){
        //     $active = array();
        //     $active['doctorstatus'] = "ACTIVE";
        //     $this->AdminModel->activeStatus($active,$id);
        // echo "appointment Work";
         }
    
}

public function appointment(){
    if($this->input->post('type')==2)
    {
        $this->load->library('session');
        $doctorid=$this->input->post('id');
        $sloats=$this->session->userdata('sloats'); 
        $patientemail=$this->session->e;

        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date( 'd-m-Y h:i:s A', time () );

        // echo $patientemail=$this->session->e;
            $datewithsloats=$sloats." ".$currentTime;

        
        $status="PENDING";
        $data = array(
            'doctorid' => $doctorid,
            'appointment_patientname' => $patientemail,
            'appointment_sloatstimewithdate' => $datewithsloats,
            'status'=>$status,
            );
            // //Transfering data to Model
            $this->load->model('PatientModel');
            $this->PatientModel->bookAppointment($data);
            echo $data['message'] = 'Data Inserted Successfully';
        
        // $data=$this->PatientModel->bookAppointment();	
        // $data=$this->AdminModel->updateDocStatus($id);	
        //  $status=$data[0]->doctorstatus;
         
        //  if($status=="ACTIVE"){
        //     $active = array();
        //     $active['doctorstatus'] = "INACTIVE";
        //     $this->AdminModel->activeStatus($active,$id);
           
        //  }
        //  if($status=="INACTIVE"){
        //     $active = array();
        //     $active['doctorstatus'] = "ACTIVE";
        //     $this->AdminModel->activeStatus($active,$id);
        // echo "appointment Work";
         }
    
}

public function updatePatientProfile(){

     echo $patientemail=$this->session->e;
   

     echo $fullname=$this->input->post('fullname');

     echo $contact=$this->input->post('contact');

     echo $gender=$this->input->post('gender');
        
     echo  $street=$this->input->post('street');
     echo   $city=$this->input->post('city');
       
     echo   $state=$this->input->post('state');
     echo   $pincode=$this->input->post('pincode');


        $this->load->model('PatientModel');

        $res=$this->PatientModel->patientProfile($patientemail,$fullname,$contact,$gender,$street,$city,$state,$pincode);
        
}

public function getPatientData(){

    $patientemail=$this->session->e;
    $this->load->model('PatientModel');
    $currentpatientrecord['records']=$this->PatientModel->fetchAllPatients($patientemail);
    
    // $this->load->View("patient/dashboard-p",$currentpatientrecord['records']);
//     print_r($currentpatientrecord['records']);

foreach ($currentpatientrecord as $key => $record) {

    
  

    echo'<div class="row gutters">';
    echo'<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">';
    echo'<div class="card h-100">';
    echo'<div class="card-body">';
    echo'<div class="account-settings">';
    echo'<div class="user-profile">';
    echo'<div class="user-avatar">';
                          
    
   
    echo "<img class='img-cover' src='".base_url().$record["0"]->patientimage."' style='max-width:50%; margin-top:20px; border-radius:50%';>";
//     
//                             <img class="w-100"
//                                 src="https://bootdey.com/img/Content/avatar/avatar1.png"
//                                 style="border-radius:50%" alt="Maxwell Admin">
echo'</div>';
//                         <!-- <h5 class="user-name">Yuki Hayashi</h5>
//     <h6 class="user-email">yuki@Maxwell.com</h6> -->
echo'</div>';
echo'<div class="text-left">';
                    echo'<form id="first_form" method="post"
                            enctype="multipart/form-data">';

                            echo'<input type="hidden" name="email" class="form-control"  value="'.$record["0"]->patientemail.'" >';
                           
                          
                            echo "<input class='btn btn-sm btn-default' type='file' name='profile_pic' size='20' />"; 
                           
                            echo'<br>';
                            echo'<button class="btn btn-default" type="button"
                                name="submit" id="filesubmit"><i class="fa fa-upload"></i></button>';

                                    echo'</form>';
                                    echo'<div class="text-left">';
                        echo'<div class="about">';
                        echo'<h5 class="mb-2 text-primary">Email</h5>';
                            echo'<p>'.$patientemail=$this->session->e.'</p>';
                            echo'</div>';
                        echo'<div class="about">';
                        echo'<h5 class="mb-2 text-primary"> Name</h5>';

                            echo'<p>'.$record["0"]->patientname.'</p>';
                            echo'</div>';
                        echo'<div class="about">';
                        echo'<h5 class="mb-2 text-primary">Phone</h5>';
                            echo'<p>'.$record["0"]->contact.'</p>';
                            echo'</div>';
                        echo'<div class="about">';
                        echo'<h5 class="mb-2 text-primary">Gender</h5>';
                            echo'<p>'.$record["0"]->gender.'</p>';
                            echo'</div>';
                        echo'<div class="about">';
                        echo'<h5 class="mb-2 text-primary">Address</h5>';
                            echo' <p>'.$record["0"]->street.' '.$record["0"]->city.' '.$record["0"]->state.' '.$record["0"]->pincode.'</p>';
                            echo' </div>';
                            echo'</div>';
                        echo'</div>';
                    echo'   </div>';
                echo'       </div>';
            echo'   </div>';
        echo'  </div>';
    echo' <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">';
    echo'   <div class="card h-100">';
        echo'   <div class="card-body">';
            echo'   <div class="row gutters">';
                echo'    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';
                    echo'       <h6 class="mb-3 text-primary"> Patient-Personal Details
                    </h6>';
                        echo'   </div>';
                    echo'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">';
                    echo'<div class="form-group">';
                        echo'<label for="fullName">Full Name</label>';
                            echo'<input type="text" class="form-control"
                                id="fullname" value="'.$record["0"]->patientname.'" placeholder="Enter full name">';
                                echo'   </div>';
                        echo' </div>';
                    echo'  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">';
                    echo' <div class="form-group">';
                    echo' <label for="phone">Phone</label>';
                            echo'<input type="text" class="form-control" value="'.$record["0"]->contact.'" id="contact"
                                placeholder="Enter phone number">';
                                echo'  </div>';
                        echo' </div>';

                    echo'</div>';
                echo' <div class="row gutters">';
                echo' <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';
                        echo'<h6 class="mb-3 text-primary">Address</h6>';
                        echo' </div>';
                    echo' <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">';
                    echo' <div class="form-group">';
                        echo'  <label for="Street">Street</label>';
                            echo' <input type="name" class="form-control" value="'.$record["0"]->street.'" id="street"
                                placeholder="Enter Street">';
                                echo' </div>';
                        echo' </div>';
                    echo'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">';
                    echo'<div class="form-group">';
                    echo'  <label for="ciTy">City</label>';
                    echo' <input type="name" class="form-control" value="'.$record["0"]->city.'" id="city"
                                placeholder="Enter City">';
                                echo'  </div>';
                        echo' </div>';
                    echo' <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">';
                    echo'<div class="form-group">';
                        echo'<label for="sTate">State</label>';
                            echo'  <input type="text" class="form-control" value="'.$record["0"]->state.'" id="state"
                                placeholder="Enter State">';
                                echo' </div>';
                        echo'<label for="male">Gender</label><br>';
                        echo'<label for="male">Male</label>&nbsp;';
                        echo'<input name="gender" id="gender" value="Male"
                            type="radio">';

                            echo'&nbsp;<label for="femail">Female</label>';
                        echo' <input name="gender" id="gender" value="Female"
                            type="radio">';
                            echo' <br>';
                        echo' <br>';
                        echo' </div>';
                    echo'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">';
                    echo'<div class="form-group">';
                        echo'<label for="zIp">Pin Code</label>';
                            echo'<input type="text" class="form-control"  value="'.$record["0"]->pincode.'" id="pincode"
                                placeholder="Pin-Code">';
                                echo' </div>';
                        echo'</div>';
                    echo'</div>';
                echo'<div class="row gutters">';
                echo'<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';
                echo'<div class="text-right">';
                echo'<button type="button"class="btn btn-secondary">Cancel</button>';
                                echo'<button type="button" id="updatePatients" name="submit" class="btn btn-primary">Update</button>';
                                echo'</div>';
                                echo'</div>';
                                echo'</div>';
                                echo'</div>';
                                echo'</div>';
        echo'</div>';
    echo'</div>';

    }

    

}

public function upload() 
{
    if($email=$this->input->post('email')){
        $email=$this->input->post('email');
    }
     $this->load->model('PatientModel');
          
    $config['upload_path'] = './upload/patientimage';
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

         $data['pic']= $this->PatientModel->profilepic($email,$img);
        
       
           redirect(base_url());
  
   
          
    }
}

public function getNotifications(){

    $patientemail=$this->session->e;
    $this->load->model('PatientModel');
    $bookedetails = $this->PatientModel->fetchNotifications($patientemail);

$de=0;

    foreach ($bookedetails as $key => $booked) {
    
       $de++;

    }
    // echo $de;


    echo'<div class="dropdown">';
    echo'<a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i
            class="icon feather icon-bell" style=""><sup style="font-size:15px; color:red;border:2px solid red; border-radius:8px; padding:3px;">'.$de.'</sup></i></a>';
    echo'<div class="dropdown-menu dropdown-menu-right notification">';
       echo'<div class="noti-head">';
            echo'<h6 class="d-inline-block m-b-0">Notifications</h6>';
            echo'<div class="float-right">';
            echo'<a href="javascript:" class="m-r-10">mark as read</a>';
                // echo'<a href="javascript:">clear all</a>';
            echo'</div>';
        echo'</div>';
        echo'<ul class="noti-body">';
            echo'<li class="n-title">';
                echo'<p class="m-b-0">NEW</p>';
            echo'</li>';

    foreach ($bookedetails as $key => $booked) {
    
            echo'<li class="notification">';
                echo'<div class="media">';
                    echo'<img class="img-radius" src="'.base_url().$booked['doctorprofilepic'].'"
                        alt="Generic placeholder image">';
                    echo'<div class="media-body">';
                        echo'<p><strong>'.$booked['doctorname'].'</strong><span class="n-time text-muted">'.$booked['appointment_sloatstimewithdate'].'&nbsp;<i
                                    class="icon feather icon-clock m-r-10"></i></span></p>';
                        echo'<p>'.$booked['status'].'</p>';
                    echo'</div>';
                echo'</div>';
            echo'</li>';
    }
    echo'</ul>';
        
        echo'</div>';
    echo'</div>';
   
}

public function alogin(){
    $this->load->view('patient/login');
}
public function medicalhis(){
    $this->load->view('patient/medicalhistory');
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