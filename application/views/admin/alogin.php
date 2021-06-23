<!DOCTYPE html>
<html>
  <?php
	// include_once "application/views/landing/header.php";
?>

    <head>
        <title>Registration form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
        <link rel="stylesheet" href="../assests/style.css">
        <link rel="stylesheet" href="../assests/signin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512 -->
    </head>
<style>
    .nav-link.align-items-center.d-flex {
    margin-left: 12px;
}
</style>
  
    <body>

        <nav class="navbar sticky-top navbar-expand-md navbar-light d-flex>
            <div class="container-fluid">
             
              <a href="/h4ind"><img class="w-25" src="../assests/images/H4INDIA-Logo.png"  alt=""></a>
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTransparentContent">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse text-center justify-content-end" id="navbarTransparentContent">
                <ul class="navbar-nav">
                  <li class="nav-item mx-1">
                    <a class="nav-link align-items-center d-flex" href="/h4ind/Common/signup ">
                      <i class="fa fa-stethoscope fa-fw fa-2x mr-2"></i> SIGNUP/SIGNIN AS DOCTOR</a>
                    
                  </li>
                  <li class="nav-item mx-1">
                    <a class="nav-link align-items-center d-flex" href="/h4ind/Patient/signup">
                      <i class="fa fa-ambulance fa-fw fa-2x mr-2"></i>SIGNUP/SIGNIN AS PATIENT</a>
                      
                  </li>
      
                </ul>
              </div>
            </div>
            
          </nav>
         


        <div class="container" id="container">
   
            <div class="form-container sign-up-container">
           
              <form >
                <h1> Admin's Sign Up</h1>
                
                </div>    
              </form>
              
            <div class="form-container sign-in-container">

              <form method="post"  action="/h4ind/Admin/alogin">
              
                <h1>Admin Sign In</h1>
                <?php  if($error=$this->session->flashdata('Login_failed')):  ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?= $error; ?>
  <a href="" class="closebtn" onclick="closeNav()">&times;</a>
  <!-- <span aria-hidden="true">&times;</span> -->
  </button>
</div>
<?php endif; ?>
                <span>or use your account</span>
                <span>
                                <small style="color:red"><?php echo $this->session->flashdata('item'); ?> <?php  echo form_error('otp') ?></small>
                               
                            </span>
                <input type="email" name="aemail" id="email" placeholder="Email" />
                <small id="emailvalid" class="text-danger
                text-muted invalid-feedback" style="color:red !important">
          Your email must be a valid email
        </small>
                <?php echo form_error('email'); ?> 
                <div class="input-group">
                 <!-- <input type="password" name="password" /> -->
                 <input type="password" name="apass1" id="password"
                     placeholder="Enter Password" aria-label="Enter Password"
                     aria-describedby="basic-addon2">
                    
             </div>
             <?php echo form_error('pass1'); ?> 
             <div class="passicon float-end">
                 <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye"
                         aria-hidden="true"></i>
                 </span>
             </div>
             
                <a href="#">Forgot your password?</a>
                
                <button type="submit" >Sign In</button>
              </form>
            </div>
            <div class="overlay-container">
              <div class="overlay">
                <div class="overlay-panel overlay-left">
                  <h1>Welcome Back!</h1>
                  <p>Please login with your personal info</p>
                  <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                  <h1>Hello, Admin!</h1>
                  <p>Enter your personal details and start your journey with us</p>
                  <button class="ghost" id="signUp">Sign Up</button>
                </div>
              </div>
            </div>
          </div>
        

    </body>
  

</html>
<script type="text/javascript" src="../assests/script/signin.js"></script>
<script>
$(document).ready(function() {
    $("#basic-addon2").click(function() {
        let passwordField = $("#password");
        let passwordFieldAttr = passwordField.attr("type");

        if (passwordFieldAttr == "password") {
            passwordField.attr("type", "text");
            $(this).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
        } else {
            passwordField.attr("type", "password");
            $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
        }
    });
});

$(function () {
        $("#sign").click(function () {
          $("#sign").hide();
          $("#otpform").show();
          $("#signup").show();
        
        });
    });

   


$(document).ready(function () {

  $("#emailerror").hide();    
          // $("#sign").hide();
          $("#otpform").hide();
          $("#signup").hide();
    });




$(document).ready(function () {        
    
    $("#email").change(function () {   
      
    var inputvalues = $(this).val();    
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;    
    if(!regex.test(inputvalues)){  
    alert("invalid email id");    
    return regex.test(inputvalues);    
    }  
    else{
    
    }  
    });    
        
     }); 


     $(document).ready(function () {        
    
    $("#sign").click(function () {   
      var to = $("#email").val();
      var pass = $("#pass").val();
      var repass = $("#repass").val();
      var subject = $("#subject").val();
      var licence = $("#licence").val();
      console.log("work");
      $.post("../Common/send",{
        to:to,
        pass:pass,
        repass:repass,
        subject:subject,
        licence:licence,
      },
      function(data,status){
        //check response
        if(status=="success"){
        alert("OTP SEND SUCEESSFULLy");

        }
        else{
          alert("some where is error")
        }
      }
      );
    
    });    
        
     }); 



    $("#email").keyup(function () {
      // Validate Email
      const email =
        document.getElementById('email');
      email.addEventListener('keyup', () => {
        let regex =
          /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        let s = email.value;
        if (regex.test(s)) {
          email.classList.remove(
            'is-invalid');
          emailError = true;
        }
        else {
          email.classList.add(
            'is-invalid');
          emailError = false;
        }
      })


    });


</script>