<!DOCTYPE html>
<?php
// include_once "application/views/landing/header.php"; 
 ?>
<html>
    <head>
        <title>Login form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">        
        <link rel="stylesheet" href="../assests/style.css">
        <link rel="stylesheet" href="../assests/signin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512 -->
        <style>
            .nav-link.align-items-center.d-flex {
    margin-left: 12px;
}
        </style>
      </head>

    <body>
    <nav class="navbar sticky-top navbar-expand-md navbar-light">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">TRANSPARENT</a> -->
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
            <a class="nav-link align-items-center d-flex" href="/h4ind/Common/login">
              <i class="fa fa-ambulance fa-fw fa-2x mr-2"></i>SIGNUP/SIGNIN AS PATIENT</a>
              
          </li>
<!--           
          <li class="nav-item mx-1">
            <a class="nav-link align-items-center d-flex" href="#">
              <i class="fa fa-stethoscope fa-fw fa-2x mr-2"></i>SIGNIN AS DOCTOR</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link align-items-center d-flex" href="#">

              <i class="fa fa-ambulance fa-fw fa-2x mr-2"></i>SIGNIN AS PATIENT</a>
          </li>
          -->
        </ul>
      </div>
    </div>
  </nav>
 



<div class="container" id="container">
   
   <div class="form-container sign-up-container">
     <form>
       <h1> Patient's Sign Up</h1>
       <!-- <div class="social-container">
         <a href="#" class="social"><i class="fab fa-instagram"></i></a>
         <a href="#" class="social"><i class="fab fa-google"></i></a>
         <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
       </div> -->
       <span>or use your email for registration</span>
       <!-- <input type="text" placeholder="Name" /> -->
       <div >
       <input  type="email" placeholder="Email" />
       </div>
       
       <div >
       <input  type="password" placeholder="Password" />    
       </div>
       
       
       <div>
       <input type="password" placeholder="Confirm-Password" />    
       </div>
       <div >
        <input  type="text" placeholder="OTP" />
       </div>
       

       <button onclick="return false;">Sign Up</button>
     </form>
   </div>
   <div class="form-container sign-in-container">
     <form>
       <h1>Patients's Sign In</h1>
       <!-- <div class="social-container">
         <a href="#" class="social"><i class="fab fa-instagram"></i></a>
         <a href="#" class="social"><i class="fab fa-google"></i></a>
         <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
       </div> -->
       <span>or use your account</span>
       <input type="email" placeholder="Email" />
       
       <div class="input-group">
        <!-- <input type="password" name="password" /> -->
        <input type="password" name="pass1" id="password"
            placeholder="Enter Password" aria-label="Enter Password"
            aria-describedby="basic-addon2">
       
    </div>
    <div class="passicon float-end">
        <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye"
                aria-hidden="true"></i>
        </span>
    </div>
    
       <a href="#">Forgot your password?</a>
       <button onclick="return false;">Sign In</button>
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
         <h1>Hello, Patient's!</h1>
         <p>Enter your personal details and start your journey with us</p>
         <button class="ghost" id="signUp">Sign Up</button>
       </div>
     </div>
   </div>
 </div>

        <main class="container my-5">
            <div class="row">
                <section class="col-md-6 my-5 offset-md-3">

                    <div class="card shadow p-5">
                        <form method="post" action="/estcodeigniter/index.php/EmailController/login">

                            <h3 class="text-center text-uppercase mb-4">Login&nbsp;
                                <?php echo @$error; ?>
                            </h3>
                            <h3 style="color:#2EB62C">
                                <?php echo $this->session->flashdata('rightotp'); ?>

                            </h3>
                            <h3 style="color:#F44336">

                                <?php
                                //  echo $this->session->flashdata('item'); 
                                 ?>


                            </h3>
                            <h3 style="color:#F44336">

                                <?php echo $this->session->flashdata('profileupdate'); ?>


                            </h3>


                            <hr>

                            <div class="form-group">
                                <label>Email</label>
                                <!-- <input type="text" name="email" /> -->
                                <input type="text" placeholder="Email" name="email" class="form-control">
                                <?php echo form_error('email'); ?> 
                                
                            </div>

                            <label for="Password">Password</label>
                            <div class="input-group mb-3">
                                <!-- <input type="password" name="password" /> -->
                                <!-- <input type="password" name="pass1" id="password" class="form-control"
                                    placeholder="Enter Password" aria-label="Enter Password"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                    </span>
                                </div>
                                 -->
                            </div>
                            <?php echo form_error('pass1'); ?> 
                            <input type="submit" name="login" value="Login"
                                class="btn btn-block btn-secondary rounded-pill mt-3" />
                            <!-- <button >Login</button> -->

                            <p class="mt-3 text-white">Don't have an Account ? <a href="/index.php/EmailController/signup"
                                    class="text-white"> Create
                                    Here</a></p>

                        </form>
                    </div>

                </section>
            </div>
        </main>

        
        
    </body>

</html>
<script type="text/javascript" src="../assests/script/signin.js"></script>
<script>
  
  $(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  


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


</script>
<?php
     include_once "application/views/landing/footer.php"; 
     ?>