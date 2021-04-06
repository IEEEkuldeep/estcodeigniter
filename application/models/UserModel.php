<?php
 class UserModel extends CI_Model{
                function registerUser($formArray){
                    $this->db->insert('customer', $formArray);
                 }

                  function validateUser($e,$p){                     
                   $query = $this->db->get('customer');

                  foreach ($query->result() as $row)
                  {
                       $pwd = $row->cust_password;
                       $email = $row->cust_email;
                       $user=$row->roleid;
                     //   $role = $row->role;
                      
               }
               echo $user;

                if(password_verify($p, $pwd)){
                  $query = $this->db->get('customer');

                  foreach ($query->result() as $row)
                  {
                       $pwd = $row->cust_password;
                       $data['email'] = $row->cust_email;
                       $data['$user']=$row->roleid;
                     //   $role = $row->role;
                      
               }

               // redirect('EmailController/dashboard',$data);
               return $data->result();
                   echo "login SuccessFul";
                       }
                  else{
                     echo "sahi pwd daal be";
                  }
                  
            }
         }
?>
