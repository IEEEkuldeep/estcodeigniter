<?php
 class UserModel extends CI_Model{
                function registerUser($formArray){
                    $this->db->insert('customer', $formArray);
                 }


                 
                  function validateUser($e,$p){  
                                   
                     $this->db->where('cust_email',$e);
                   $query = $this->db->get('customer');

                  foreach ($query->result() as $row)
                  {
                       $pwd = $row->cust_password;
                       $email = $row->cust_email;
                       $user=$row->roleid;
                     //   $role = $row->role;
                      
               }
               

                if(password_verify($p, $pwd)){


                  $this->db->select('');
                           $this->db->from('customer');            
               $this->db->where('cust_email',$e);
               $query=$this->db->get()->result();

               //  echo "<pre>";
               //  print_r($query);

               return $query;  
                           
               //  redirect('EmailController/dashboard');
               // return $data->result();



                   echo "login SuccessFul";
                       }
                  else{
                     
                     return 0;
                     echo "sahi pwd daal be";
                  }
                  
            }

            function UpdateProfile($formArray,$e){

                  if($formArray['cust_email']==$e){
                   $this->db->where('cust_email', $e);
                 $this->db->update('customer', $formArray);
                     return 1;
                  }
                  else{
                     return 0;
                     echo "your email in not  matched";
                  }
               // print_r();
               // print_r($formArray);
            
               
            }

            function passwordvalidate($old,$new,$e){
                
               $this->db->where('cust_email', $e);
               $query = $this->db->get('customer');

                  foreach ($query->result() as $row)
                  {
                    $pwd = $row->cust_password;
                     $email = $row->cust_email;
                     $user=$row->roleid;

                      
               }

               
                  $newpass = password_hash($new, PASSWORD_DEFAULT);
               if(password_verify($old, $pwd)){

// echo "<pre>";
// echo $old;
// echo "<pre>";


// echo "<pre>";
// echo $pwd;
// echo "<pre>";

$appointment_id = $e;
$appointment = array('cust_password' => $newpass);    
$this->db->where('cust_email', $appointment_id);
$this->db->update('customer', $appointment); 

               return 1;
                  echo "password change successful";
                       }
                  else{
                     return 0;      
                     echo "Old password doesn't match";
                  }
               // }
            }

            function profilepic($e,$img){
               
                $this->db->where('cust_email', $e);
               $query = $this->db->get('customer');

                  foreach ($query->result() as $row)
                  {
                    $pwd = $row->cust_password;
                     $email = $row->cust_email;
                     $user=$row->roleid;

                      
               }
               if($e===$email){

                  $appointment_id = $e;
                  $appointment = array('cust_profile_img' => $img);    
                  $this->db->where('cust_email', $appointment_id);
                  $this->db->update('customer', $appointment); 

                  return true;
               }
               else{
                  return $e.$email;
               }
               
               

            }

            function validate ($user,$pass){
               $this->db->select('*');
               $this->db->from('customer');
               $this->db->where('cust_email',$user);
               $this->db->where('cust_password',$pass);
               $query = $this->db->get();
               $res = $query->result();
               return $res;
               
            }


         }
?>
