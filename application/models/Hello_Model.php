<?php

class Hello_Model extends CI_Model{
    function saverecords($firstname,$lastname,$email){

        echo $firstname;
       $query="insert into user values('','$firstname','$lastname','$email','')";

        $this->db->query($query);
        
    }
    function getdata(){
       $query=$this->db->query("select * from user");
	return $query->result();
    }

    function deleterecords($id){
        $query= $this->db->query("delete from user where userid='".$id."' ");
    }

    function getRecordsById($id){
        $query= $this->db->query("select * from user where userid='$id'");

    //    print_r($query->result());
     return $query->result();

    }

      function updaterecords($f,$l,$e,$id){

        $query= $this->db->query("update user set firstname='$f',lastname = '$l', email='$e' where userid ='$id'");

    }
   function loginvalidate($e,$p){


    $query = $this->db->query(" select * from user where email='$e' and password='$p'");
     echo $row=$query->num_rows();

     if($row){
        redirect("Hello/savedata");
     }
     else{
         $data['error']="<h3 style='color:red'>Invalid Login</h3>";
     }
       return $this->load->View('user/login',@$data);
    //    $query=
        // return $query->result();
   }
}
?>
