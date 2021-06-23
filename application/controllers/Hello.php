<?php 
class Hello extends CI_Controller{

    function __construct(){
        parent::__construct();
    // $this->load->database();
    // $this->load->model('UserModel');
    // $this->UserModel->work();


    }
    
    public function savedata(){
        
        $this->load->model('Hello_Model');
        // $this->Hello_Model->saverecords();
        $this->load->View('user/registration.php');

        if($this->input->post('save')){
            $n=$this->input->post('firstname');
            $e=$this->input->post('lastname');
            $m=$this->input->post('email');

            $this->Hello_Model->saverecords($n,$e,$m);
            echo "Records Saved Successfully";
             redirect(base_url().'index.php/Hello/dispdata');
        }else{
            echo "Working";
        }

        
    }

    public function dispdata(){
         $this->load->model('Hello_Model');
         $results['data'] =  $this->Hello_Model->getdata();
         $this->load->View("user/display.php",$results);
    }

    public function deletedata(){
        $this->load->model('Hello_Model');
        $id=$this->input->get('id');
        $this->Hello_Model->deleterecords($id);
        redirect(base_url().'index.php/Hello/dispdata');
        
    }

    public function login(){
     $this->load->model('Hello_Model');
     if($this->input->post('login')){

        $e=$this->input->post('email');
        $p=$this->input->post('password');

        $this->Hello_Model->loginvalidate($e,$p);

     }else{
          $this->load->View("user/login.php");

     }
       
    }
    public function dashboard(){
        $this->load->View("user/dashboard.php");
    }

    public function updatedata(){
        $this->load->model('Hello_Model');
        $id=$this->input->get('id');
        // echo $id;
        
 $results['data'] = $this->Hello_Model->getRecordsById($id);
 

$this->load->View("user/update.php",$results);
        // $results['data']=$this->Hello_Model->update($id);
       
        
        if($this->input->post('update')){
            $f=$this->input->post('firstname');
            $l=$this->input->post('lastname');
            $e=$this->input->post('email');

            $this->Hello_Model->updaterecords($f,$l,$e,$id);
                // echo "Record Updated Successfully";
            redirect(base_url()."index.php/Hello/dispdata");
        }
        
    }


    public function index(){
        echo "Hello World";
        
    }
    public function about(){
        $this->load->View('landing/about.php');
        $this->load->model('UserModel');
        $this->UserModel->work();
        echo "about Work";
    }
    
   

}


?>
