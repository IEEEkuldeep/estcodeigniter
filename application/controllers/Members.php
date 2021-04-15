<?php 

class Members extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('member');
    }
    
    public function index(){
        $data = array();
        
        // Get rows count
        $conditions['returnType']     = 'count';
        $rowsCount = $this->member->getRows($conditions);
        
        // Get rows
        $conditions['returnType'] = '';
        $data['members'] = $this->member->getRows($conditions);
        $data['title'] = 'Members List';
        
        // Load the list page view
        $this->load->view('templates/header', $data);
        $this->load->view('members/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function memData(){
        $id = $this->input->post('id');
        if(!empty($id)){
            // Fetch member data
            $member = $this->member->getRows(array('id'=>$id));
            
            // Return data as JSON format
            echo json_encode($member);
        }
    }

    public function listView(){
        $data = array();
        
        // Fetch all records
        $data['members'] = $this->member->getRows();
            
        // Load the list view
        $this->load->view('members/view', $data);
    }
    
    public function add(){
        $verr = $status = 0;
        $msg = '';
        $memData = array();
        
        // Get user's input
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $gender = $this->input->post('gender');
        $country = $this->input->post('country');
        
        // Validate form fields
        if(empty($first_name) || empty($last_name)){
            $verr = 1;
            $msg .= 'Please enter your name.<br/>';
        }
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $verr = 1;
            $msg .= 'Please enter a valid email.<br/>';
        }
        if(empty($country)){
            $verr = 1;
            $msg .= 'Please enter your country.<br/>';
        }
        
        if($verr == 0){
            // Prepare member data
            $memData = array(
                'first_name'=> $first_name,
                'last_name'    => $last_name,
                'email'        => $email,
                'gender'    => $gender,
                'country'    => $country
            );
            
            // Insert member data
            $insert = $this->member->insert($memData);
            
            if($insert){
                $status = 1;
                $msg .= 'Member has been added successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
    
    public function edit(){
        $verr = $status = 0;
        $msg = '';
        $memData = array();
        
        $id = $this->input->post('id');
        
        if(!empty($id)){
            // Get user's input
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $gender = $this->input->post('gender');
            $country = $this->input->post('country');
            
            // Validate form fields
            if(empty($first_name) || empty($last_name)){
                $verr = 1;
                $msg .= 'Please enter your name.<br/>';
            }
            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $verr = 1;
                $msg .= 'Please enter a valid email.<br/>';
            }
            if(empty($country)){
                $verr = 1;
                $msg .= 'Please enter your country.<br/>';
            }
            
            if($verr == 0){
                // Prepare member data
                $memData = array(
                    'first_name'=> $first_name,
                    'last_name'    => $last_name,
                    'email'        => $email,
                    'gender'    => $gender,
                    'country'    => $country
                );
                
                // Update member data
                $update = $this->member->update($memData, $id);
                
                if($update){
                    $status = 1;
                    $msg .= 'Member has been updated successfully.';
                }else{
                    $msg .= 'Some problem occurred, please try again.';
                }
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
    
    public function delete(){
        $msg = '';
        $status = 0;
        
        $id = $this->input->post('id');
        
        // Check whether member id is not empty
        if(!empty($id)){
            // Delete member
            $delete = $this->member->delete($id);
            
            if($delete){
                $status = 1;
                $msg .= 'Member has been removed successfully.';
            }else{
                $msg .= 'Some problem occurred, please try again.';
            }
        }else{
            $msg .= 'Some problem occurred, please try again.';
        }  
        
        // Return response as JSON format
        $alertType = ($status == 1)?'alert-success':'alert-danger';
        $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
        $response = array(
            'status' => $status,
            'msg' => $statusMsg
        );
        echo json_encode($response);
    }
}



// class Members extends CI_Controller{
//     function __construct(){
//         parent::__construct();
//         //Load member model 
//         $this->load->model('Member');
//     }
// public function index(){
//     $data = array();

//     // //get  rows count
//     $conditions['returnType'] = 'count';
//     // $rowsCount = $this->member->getRows($conditions);
//     // //get rows 
//     // $conditions['returnType'] ='';
//     // $data['memebers'] = $this->member->getRows($conditions);
//     // $data['title'] = 'Members List';

//     //Load the list  page view

//     // $this->load-view('user/header',$data);
//     // $this->load->view('user/index',data);
//     // $this->load->view('user/footer');
//     $this->load->view('user/memberdata');
// }
// public function memData(){
//    $id = $this->input->post('id');
//    if(!empty($id)){
// //fetch member data
// $member = $thi->member->getRows(array('id'=>$id));

// // return data as JSON format
// echo json_encode($member);


//    }

// }
// public function listview(){
//     $data = array();

//     //fetch all records
// $data['members'] = $this->member->getRows();
// //load the list view
// $this->load->view('user/view',$data);

// }
// public function add(){
// // $verr = status = 0;
// $msg = '';
// $memData = array();

// // get userrs input

// $first_name=$this->input->post('first_name');
// $last_name=$this->input->post('lastname');
// $email=$this->input->post('email');
// $gender=$this->input->post('gender');
// $country=$this->input->post('country');


// //validate form fields

// if(empty($first_name) || empty($last_name)){
// $verr = 1 ;
// $msg .= 'Please enter your name.<br/>';
// }
// if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
// $verr = 1;
// $msg .= 'Please enter a valid email.<br/>';

// }
// if(empty($country)){
//     $verr =1;
//     $msg .= 'Please Enter Your country.<br/>';
// }
// if($verr == 0){
//     //Prepare member data

//     $memData = array(
//         'first_name'=>$first_name,
//         'last_name'=>$last_name,
//         'email'=>$email,
//         'gender' =>$gender,
//         'country' =>$country
//     );
// //insert member data 
//  $insert = $this->member->insert($memData);
// if($insert){
//     $status = 1;
//     $msg .='Member has been added successfully';
// }else{
//     $msg .='Some Problem Occur please tyr again.';
// }


// }
// // return response as JSON Format
// $alertType = ($status == 1)?'alert-success':'alert-danger';
// $statusMsg =   '<p class="alert '.$alertType.'">'.$msg.'</p>';

// $response = array(
// 'status' =>$status,
// 'msg' =>$statusmsg
// );
// echo json_encode($response);

// }
// // public funnction edit(){
// // $verr = $status = 0;
// // $msg = '';

// // $memData  = array();
// // $id  = $this->input->post('id');
// // if(!empty($id)){
// // //Get user's input
// // $first_name =$this->input->post('first_name');
// // $last_name = $this->input0>post('last_name');
// // $email = $this->input->post('email');
// // $gender = $this->input->post('gender');
// // $country = $this->input->post('country');
// // //validate form field
// //  if(empty($first_name) || empty($last_name)){
// //      verr = 1;
// //      $msg .='Please enter your name.<br/>';

// //  }
// //  if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
// //      $verr= 1;
// //      $msg .='Please enter your valid email.<br/>';
// //  }
// //  if(empty($country)){
// //      $verr = 1;
// //      $msg .= 'please enter your country.<br/>';

// //  }
// // if($verr == 0){
// // //prepare member data
// // $memData = array(
// //     'first_name' => $first_name,
// //     'last_name' => $last_name,
// //     'email' => $email,
// //     'gender' => $gender,
// //     'country' => $country

// // );

// // //update member data
// //  $update = $this->member->update($memData,$id);
// //  if($update){
// //      $status =1;
// //      $msg .='Memebr has been updated successfully';
// //  }else{
// //      $msg .='Some problem occur please try again';
// //  }

// // }

// // }else{
// //     $msg .='Some Problem is Occu please try again';
// // }
// // // Return response as JSON format
// // $alertType = ($status == 1)?'alert-success':'alert-danger';
// // $statusMsg = '<p class=""alert '.$alertType.'>'.$msg.'</p>';
// // $response = array(
// //     'status'=>$status;
// //     'msg' =>$statusMsg;
// // );
// // echo json_encode($response);


// // }

// public function delete(){
//     $msg = '';
//     $status = 0;
//     $id = $this->input->post('id');
//     // check wheather member  is is not empty 
//     if(!empty($id)){
//         // delete member
//         $delete = $this->member->delete($id);
//         if(delete){
//             $status =1;
//             $msg .='Memeber has been remooved successfully';
//         }else{
//             $msg .='Some problem occur please try again ';
//         }

//     }else{
//         $msg .='Some problem occur please try again ';
//     }
//      // Return response as JSON format
//      $alertType = ($status == 1)?'alert-success':'alert-danger';
//      $statusMsg = '<p class="alert '.$alertType.'">'.$msg.'</p>';
//      $response = array(
//          'status' => $status,
//          'msg' => $statusMsg
//      );
//      echo json_encode($response);

// }

// }



?>