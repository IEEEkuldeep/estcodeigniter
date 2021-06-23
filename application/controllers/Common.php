<?php
class Common extends CI_Controller 
{

    
    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url');
        ob_start(); # add this
    }


    public function index() 
	{
        $this->load->view('landing/home');
    }

    public function forgotpass() 
	{
        $this->load->view('landing/forgotpass');
    }


    public function signup() 
	{
        redirect("/Doctor/signup");
    }
    public function patient(){
        redirect("/Patient/signup");
    }
    
//For Sending OTP
    function send(){
        // $this->form_validation->set_rules('firstname','firstname is required','required');
        // $this->form_validation->set_rules('lastname','lastname is required','required');
        // $this->form_validation->set_rules('contact','contact no is required','required|min_length[10]|max_length[10]');
//         $this->load->library('form_validation');
//         $this->form_validation->set_rules('to', 'email is already used', 'required|min_length[5]|max_length[25]|valid_email|is_unique[doctorsignup.doctoremail]');
//         $this->form_validation->set_rules('pass', 'Password is required', 'required|matches[repass]');
//         $this->form_validation->set_rules('repass',' confirm password  and password not matched','required|matches[pass]');

// $this->form_validation->set_error_delimiters('<div class="error">','</div>');
// $this->form_validation->set_message('required', 'Your %s');
// if ($this->form_validation->run() == FALSE)
// {  
//     $this->load->view('user/email');
// }
// else{

    $otp = rand(1000,9999);
        
    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $to = $this->input->post('to');
        // $firstname=$this->input->post('firstname');
        // $lastname=$this->input->post('lastname');
        // $contact=$this->input->post('contact');
        $pass=$this->input->post('pass');
        $licence = $this->input->post('licence');
        $email=$to;
        // $this->session->set_userdata('fname', $firstname);
        // $this->session->set_userdata('lname', $lastname);
        // $this->session->set_userdata('contact', $contact);
        $this->session->set_userdata('email', $email);
         $this->session->set_userdata('pass', $pass);
        $this->session->set_userdata('lic',$licence);
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');
    $message = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
<div style="margin:50px auto;width:70%;padding:20px 0">
<div style="border-bottom:1px solid #eee">
  <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Welcome, EncoreSky-Tech</a>
</div>
<p style="font-size:1.1em">Hi,</p>
<p>Thank you for choosing EncoreSky Technologies. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
<h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
';

$messageData ='</h2><p style="font-size:0.9em;">Regards,<br />EncoreSky Technologies</p>
<hr style="border:none;border-top:1px solid #eee" />
<div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
<p>Encore Sky Technology Pvt Ltd</p>
<p>PU4 Scheme No.54 Vijay Nagar</p>
<p>Indore</p>
</div>
</div>
</div>';

       $this->email->set_newline("\r\n");
       $this->email->from($from);
       $this->email->to($to);
       $this->email->subject($subject);
        // $this->email->message($message.$otp);
    $this->email->message($message." OTP->".$otp.$messageData);
        if ($this->email->send())
        {
            // print_r($otp);
             $this->otp($otp);
        }
        else{
        show_error($this->email->print_debugger());
        }
// }

}

function otp($otp){
   
    // $this->load->View("user/email.php");
    $this->session->set_userdata('validotp', $otp);
    
    if($this->session->userdata('userId') == '') { 
        
        //take them back to signin
    }
    
}


function validateotp(){

  $this->form_validation->set_rules('otp', 'OTP is Required', 'required|min_length[4]|max_length[4]');
    

        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_message('required', 'Your %s');
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('user/email');
        }
        else{


        if($this->input->post('otp')){
            $n=$this->input->post('otp');
            // $otp = $this->otp;
        if($n==$this->session->validotp){
              $this->load->model('UserModel');
             $this->session->set_flashdata('rightotp','User Register Successfully');
              $userdata = array();

            //  $userdata['cust_name'] = $this->session->fname;
            //  $userdata['cust_lname'] = $this->session->lname;
            //  $userdata['cust_contact'] = $this->session->contact;
             $userdata['doctoremail'] = $this->session->email;
            //  $userdata['cust_profile_img'] = '/upload/default.jpg';
            //  $userdata['roleid'] = 1;
             $p = $this->session->pass;
              $licence = $this->session->lic;
              $userdata['doctorstatus'] ="INACTIVE";
              $userdata['doctorlicence'] = $licence;
                $hashed_password = password_hash($p, PASSWORD_DEFAULT);

             $userdata['doctorpass']=$hashed_password;

             $this->UserModel->registerUser($userdata);

            //  echo "Otp validate Success";
            //  $this->signup();
            redirect("/Doctor/signup");
              
        
        }
            else{
                $this->session->set_flashdata('item','Wrong Otp');   
                redirect("/Doctor/signup");
                // $this->load->View("user/email.php");
            }
        }
        else{         
           $this->session->set_flashdata('item','This field is required');   
            // $this->load->View("user/email.php");  
            redirect("/Doctor/signup");
        }

        }

    }



function validateForgotOtp(){

    $this->form_validation->set_rules('optform', 'OTP is Required', 'required|min_length[4]|max_length[4]');
      
  
          $this->form_validation->set_error_delimiters('<div class="error">','</div>');
          $this->form_validation->set_message('required', 'Your %s');
          if ($this->form_validation->run() === FALSE)
          {  
              $this->load->view('landing/forgotpass');
          }
          else{
  
  
          if($this->input->post('optform')){
              $n=$this->input->post('optform');
              // $otp = $this->otp;
          if($n==$this->session->validotp){
                $this->load->model('DoctorModel');
                $this->load->model('PatientModel');
                
               $this->session->set_flashdata('VerifyOtp','OTP Verifyied');
               echo $email=$this->input->post('to');
               echo $p=$this->input->post('password');

               
               $data=$this->DoctorModel->getDoctorIdEmail($email);
                


               print_r($data);

                if(!empty($data)){

                    $hashed_password = password_hash($p, PASSWORD_DEFAULT);
                    $this->DoctorModel->updatePassword($email,$hashed_password);
                  
                }
                else{
                    $hashed_password = password_hash($p, PASSWORD_DEFAULT);
                    $this->PatientModel->updatePatientPassword($email,$hashed_password);
                  
                }


                // $userdata = array();
  
            //    $userdata['doctoremail'] = $this->session->email;
  
            //    $p = $this->session->pass;
            //     $licence = $this->session->lic;
            //     $userdata['doctorstatus'] ="INACTIVE";
            //     $userdata['doctorlicence'] = $licence;
            //       $hashed_password = password_hash($p, PASSWORD_DEFAULT);
  
            //    $userdata['doctorpass']=$hashed_password;
  
            //    $this->UserModel->registerUser($userdata);
  
            //   //  echo "Otp validate Success";
              //  $this->signup();
              
              echo "Correct OTP";
            //   redirect("/Common/forgotpass");
                
          
          }
              else{
                  $this->session->set_flashdata('VerifyOtp','Please Enter Correct OTP');   
                  echo "INCorrect OTP";
                //   redirect("/Common/forgotpass");
                  // $this->load->View("user/email.php");
              }
          }
          else{         
            $this->session->set_flashdata('VerifyOtp','OTP Field is Required');     
              // $this->load->View("user/email.php");  
            //   redirect("/Common/forgotpass");
          }
  
          }
  
      }



    function potp(){

        $this->form_validation->set_rules('otp', 'OTP is Required', 'required|min_length[4]|max_length[4]');
          
      
              $this->form_validation->set_error_delimiters('<div class="error">','</div>');
              $this->form_validation->set_message('required', 'Your %s');
              if ($this->form_validation->run() === FALSE)
              {  
                  $this->load->view('user/email');
              }
              else{
      
      
              if($this->input->post('otp')){
                  $n=$this->input->post('otp');
                  // $otp = $this->otp;
              if($n==$this->session->validotp){
                    $this->load->model('UserModel');
                   $this->session->set_flashdata('rightotp','User Register Successfully');
                    $userdata = array();
      
                  //  $userdata['cust_name'] = $this->session->fname;
                  //  $userdata['cust_lname'] = $this->session->lname;
                  //  $userdata['cust_contact'] = $this->session->contact;
                   $userdata['patientemail'] = $this->session->email;
                  //  $userdata['cust_profile_img'] = '/upload/default.jpg';
                  //  $userdata['roleid'] = 1;
                   $p = $this->session->pass;
                    // $licence = $this->session->lic;
      
                    // $userdata['doctorlicence'] = $licence;
                      $hashed_password = password_hash($p, PASSWORD_DEFAULT);
      
                   $userdata['patientpass']=$hashed_password;
      
                   $this->UserModel->registerPatient($userdata);
      
                  //  echo "Otp validate Success";
                  //  $this->signup();
                  redirect("/Patient/signup");
                    
              
              }
                  else{
                      $this->session->set_flashdata('item','Wrong Otp');   
                      redirect("/Patient/signup");
                      // $this->load->View("user/email.php");
                  }
              }
              else{         
                 $this->session->set_flashdata('item','This field is required');   
                  // $this->load->View("user/email.php");  
                  redirect("/Patient/signup");
              }
      
              }
      
          }
      



    // function updateprofile(){

    //       if($this->input->post('firstname')){
    //         // $this->form_validation->set_rules('email','Email','required | valid_email');
    //         // $this->form_validation->set_rules('pass1', 'Password', 'required');

    //         $fname=$this->input->post('firstname');
    //         $lname=$this->input->post('lastname');
    //         $contact=$this->input->post('contact');
    //         $address=$this->input->post('address');
    //         $mail=$this->input->post('email');
    //         $this->load->model('UserModel');

    //         $userprofile = array();

    //          $userprofile['cust_name'] = $fname;
    //          $userprofile['cust_lname'] = $lname;
    //          $userprofile['cust_contact'] = $contact; 
    //          $userprofile['cust_address'] = $address;
    //          $userprofile['cust_email'] = $mail;
             
    //           $s=$this->UserModel->UpdateProfile($userprofile,$mail);
    //         //   print_r($s);
    //           if($s==1){
                              
    //         echo  $e = $this->session->e;
    //         echo $p = $this->session->p;
    //         $data['user_data'] = $this->UserModel->validateUser($e,$p);    
    //         // print_r($data['user_data']);
    //         if($data['user_data']==0){

    //      $this->session->sess_destroy();
    //   $this->session->sess_destroy();
    //          redirect(base_url());
    
    //         }
    //         else{
                  
    //                 if ($e||$p)
    //                 {
    //                     $this->session->set_flashdata('updateprofile','update profile successfully');
    //                     $this->dashboarddata($data);
    //                 }

    //         }
    //             //   $this->session->set_flashdata('profileupdate','profile updated Successfully');  
    //         //  $this->session->sess_destroy();
    //         //     $this->session->sess_destroy();
    //             // redirect('/EmailController/login'); 
    //           }
    //           else{
                       
    //           }
    //         //  $this->load->View("user/login.php");
    //         //  $this->session->sess_destroy();
    //             // $this->session->sess_destroy();
    //             //  $this->session->set_flashdata('profileupdate','profile updated Successfully');  
    //             // redirect('/EmailController/login'); 
    //         //  if($s == 1){
                  
                   
    //         //         // print_r($s);
    //         //  }
    //         //  else{
    //         //     //   $this->session->set_flashdata('profileupdate','profile not updated');   
    //         //         // $this->load->View("user/dashboard.php");
    //         //  }
            
    //  }
    //  else{
    //      echo "not submitted data";
          
    //  }

    // }

   
//     function changepass(){
// if($this->input->post('pass')){
//             // $this->form_validation->set_rules('email','Email','required | valid_email');
//             // $this->form_validation->set_rules('pass1', 'Password', 'required');

//             $oldpass=$this->input->post('pass');
//             $newpass=$this->input->post('newpass');
//             $email=$this->input->post('email');

//             $this->load->model('UserModel');
              
//            $data['us']= $this->UserModel->passwordValidate($oldpass,$newpass,$email);
//         //   print_r($data);

//           if($data['us']==0){
                          
//             echo  $e = $this->session->e;
//             echo $p = $this->session->p;
//             $data['user_data'] = $this->UserModel->validateUser($e,$p);    
//             // print_r($data['user_data']);
//             if($data['user_data']==0){

//         //  $this->session->sess_destroy();
//     //   $this->session->sess_destroy();
      
//              redirect(base_url());
//             //  $this->session->set_flashdata('passwordchange', 'passsword changed successful');
    
//             }
//             else{
                  
//                     if ($e||$p)
//                     {
                        
//                         $this->session->set_flashdata('oldpass', 'old pass not matched');
//                         $this->dashboarddata($data);
                        
//                     }

//             }
              
//             //    $this->load->View("landing/home.php");
//             echo " old passsword not matched";

//           }
//           elseif($data['us']==1){
//             $this->session->set_flashdata('passwordchange', 'Passsword changed successful');
//             redirect(base_url());

//             // $this->load->View("user/dashboard.php");
//           }
//     //           $this->session->sess_destroy();
//     //   $this->session->sess_destroy();
//             //  $this->load->View("user/login.php");




              
// // $this->load->View("landing/home.php");
//         }
//         else{
            
//             echo "field can not be blank";
//         }

          

//     }



//   public function upload() 
// 	{
//         if($email=$this->input->post('email')){
//             $email=$this->input->post('email');
//         }

//          $this->load->model('UserModel');
              
           

        
        
//         $config['upload_path'] = './upload/';
//         $config['allowed_types'] = 'gif|jpg|png';
//         $config['max_size'] = 2000;
//         $config['max_width'] = 1500;
//         $config['max_height'] = 1500;

//         $this->load->library('upload', $config);

//         if (!$this->upload->do_upload('profile_pic')) 
// 		{
//             $error = array('error' => $this->upload->display_errors());
//             print_r($error);
//             // $this->load->view('user/imageupload_form.php', $error);

//         } 
// 		else 
// 		{
//             $data = array('image_metadata' => $this->upload->data());
            
//             // print_r($data['image_metadata']['full_path']);
//             $d=$data['image_metadata']['full_path'];
//             // echo "<pre>";
//             $img=substr($d,33);
//             $data['pic']= $this->UserModel->profilepic($email,$img);
            
//               echo  $e = $this->session->e;
//               echo $p = $this->session->p;
//               $data['user_data'] = $this->UserModel->validateUser($e,$p);    
//               // print_r($data['user_data']);
//               if($data['user_data']==0){
  
//            $this->session->sess_destroy();
//              $this->session->sess_destroy();
//                redirect(base_url());
      
//               }
//               else{
//             // $this->load->views('user/dashboard.php');
                       
//                       if ($e||$p)
//                       {
//                         $this->session->set_flashdata('pro','Profile update success');   
//                           $this->dashboarddata($data);
//                       }
  
              
//               }
              
//         }
//     }


}
?>
