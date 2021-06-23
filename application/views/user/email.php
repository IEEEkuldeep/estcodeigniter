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
                    <a class="nav-link align-items-center d-flex" href="/h4ind/Common/patient">
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
            <!-- onsubmit="return ValidationEvent()"
                            action="/h4ind/Common/send" -->
              <form method="post"   action="/h4ind/Common/validateotp" >
                <h1> Doctor's Sign Up</h1>
                <!-- <div class="social-container">
                  <a href="#" class="social"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="social"><i class="fab fa-google"></i></a>
                  <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
                </div>
                <span>or use your email for registration</span> -->
                <!-- <input type="text" placeholder="Name" /> -->
                <div>
<input type="text" id="licence" name="lic" placeholder="Med-Licence-No" />
                </div>
                <div >
                
                <input type="email" id="email" name="to" placeholder="Email" />
                <?php echo form_error('to'); ?> 
                <input type="hidden" name="subject" id="subject" placeholder="Enter Subject"
                                    value="OTP Verification">
                <!-- <small><span id="emailerror
                   ">invalid Email</span></small> -->
                  <!-- <small><span id="emailcorrect">Invalid Email</span></small> -->
      
                </div>
                
                <div >
                <input id="pass" type="password" name="pass" placeholder="Password" />    
                </div>

                <?php echo form_error('pass'); ?> 
                
                <div>
                <input id="repass" type="password" id="otpbtn" name="repass" placeholder="Confirm-Password" />    
                </div>
                <?php echo form_error('repass'); ?>        
                <div >
                 <input  id="otpform" name="otp" type="text" placeholder="OTP" />
                </div>
                <button type="submit" id="signup" >Sign Up</button>
            
            
                <button type="button"  id="sign" >Send OTP</button>
                <!-- <button type="button"  id="send" >Send OTP</button> -->
                </div>    
              </form>
              
              <!-- <form method="post" action="/h4ind/Common/validateotp">
              
            </form>
             -->
            <div class="form-container sign-in-container">

              <form method="post"  action="/h4ind/Doctor/login">
              
                <h1>Doctor's Sign In</h1>
                <!-- <div class="social-container">
                  <a href="#" class="social"><i class="fab fa-instagram"></i></a>
                  <a href="#" class="social"><i class="fab fa-google"></i></a>
                  <a href="#" class="social"><i class="fab fa-tiktok"></i></a>
                </div> -->
                <span>or use your account</span>
                <span>
                                <small style="color:red"><?php echo $this->session->flashdata('item'); ?> <?php  echo form_error('otp') ?></small>
                               
                            </span>
                <input type="email" name="email"  placeholder="Email" />
                <?php echo form_error('email'); ?> 
                <div class="input-group">
                 <!-- <input type="password" name="password" /> -->
                 <input type="password" name="pass1" id="password"
                     placeholder="Enter Password" aria-label="Enter Password"
                     aria-describedby="basic-addon2">
                     <?php echo form_error('pass1'); ?> 
             </div>
             <div class="passicon float-end">
                 <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye"
                         aria-hidden="true"></i>
                 </span>
             </div>
             
                <a href="#">Forgot your password?</a>
                <!-- <button onclick="return false;">Sign In</button> -->
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
                  <h1>Hello, Doctor's!</h1>
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
          // $("#sign").show();
          $("#otpform").show();
          $("#signup").show();
          //   if ($(this).val() == "Yes") {
          //       $("#sign").show();
          //   } else {
          //       $("#sign").hide();
          //   }
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
      // console.log("work");
      // $("#emailerror").show();
    alert("invalid email id");    
    return regex.test(inputvalues);    
    }  
    else{
      // $("#emailcorrect").show(); 
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


</script>

<!-- <script>
    $(document).ready(function () {
        $("#basic-addon2").click(function () {
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

    function ValidationEvent() {

        // var name = document.getElementById("name").value;
        // var lname = document.getElementById("lname").value;
        // var mail = document.getElementById("mail").value;
        // var contact = document.getElementById("contact").value;
        // var pass = document.getElementById("pass").value;
        // var confirmpass = document.getElementById("confirmpass").value;

        // console.log(name);
        // console.log(lname);
        // console.log(mail);
        // console.log(contact);
        // console.log(pass);
        // console.log(confirmpass);

        // var emailReg = "/^([w-.]+@([w-]+.)+[w-]{2,4})?$/";
        // // Conditions
        // if (name != '' && mail != '') {
        //     if (mail.match(emailReg)) {

        //         if (contact.length == 10) {
        //             alert("All type of validation has done on OnSubmit event.");
        //             return true;
        //         } else {
        //             alert("The Contact No. must be at least 10 digit long!");
        //             return false;
        //         }

        //     } else {
        //         alert("Invalid Email Address...!!!");
        //         return false;
        //     }
        // } else {
        //     alert("All fields are required.....!");
        //     return false;
        // }




        // return false;

        // Regular Expression For Email
        // var emailReg = /^([w-.]+@([w-]+.)+[w-]{2,4})?$/;
        // // Conditions
        // if (name != '' && email != '' && contact != '') {
        //     if (email.match(emailReg)) {
        //         if (document.getElementById("male").checked || document.getElementById("female").checked) {
        //             if (contact.length == 10) {
        //                 alert("All type of validation has done on OnSubmit event.");
        //                 return true;
        //             } else {
        //                 alert("The Contact No. must be at least 10 digit long!");
        //                 return false;
        //             }
        //         } else {
        //             alert("You must select gender.....!");
        //             return false;
        //         }
        //     } else {
        //         alert("Invalid Email Address...!!!");
        //         return false;
        //     }
        // } else {
        //     alert("All fields are required.....!");
        //     return false;
        // }

    }
    function namevalid() {
        character = /[A-Za-z]/;

        var name = document.getElementById("name").value;
        if (name.match(character)) {
            console.log("it's a character");
        }
        else {
            console.log("it's a number");
        }

        // console.log(name);
    }

</script> -->
<?php
    //  include_once "application/views/landing/footer.php"; 
     ?>