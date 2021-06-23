<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset password</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content=" responsive, template">
    <meta name="author" content="" />

    <!-- <link rel="icon" href="/h4ind/assests/imagesimg/favicon.ico" type="image/x-icon"> -->
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="/h4ind/assests/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="/h4ind/assests/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="/h4ind/assests/css/style.css">

   
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-mail auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Reset Password</h3>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
              

                    <div class="input-group mb-3"  >
                        <input type="email" id="optform" class="form-control" placeholder="Enter OTP">
                    </div>

                    <div class="input-group mb-3"  >
                      <input type="text" id="passwordform" class="form-control" placeholder="Password">
                  </div>
                    <div class="input-group mb-3"  >
                      <input type="email" id="confirmpasswordform" class="form-control" placeholder="Re-enter Password">
                  </div>

                 
                    <button id="sendotp" class="btn btn-primary mb-4 shadow-2">Send OTP </button>
                    
                    <button id="verifyotp" class="btn btn-primary mb-4 shadow-2">Verify OTP </button>
                  
                    <p class="mb-0 text-muted">Don’t have an account? <a href="<?php echo base_url('./Doctor/signup') ?>">Signup</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="/h4ind/assests/js/vendor-all.min.js"></script>
    <script src="/h4ind/assests/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/h4ind/assests/js/pcoded.min.js"></script>


    <script type="text/javascript">

 $("#verifyotp").hide();
 $("#optform").hide();
 $("#passwordform").hide();
            $("#confirmpasswordform").hide();
          
 
$("#sendotp").click(function () {
            $("#sendotp").hide();
            $("#verifyotp").show();
            $("#optform").show();
            $("#passwordform").show();
            // $("#updatepassword").show();
            $("#confirmpasswordform").show();
        });


        $("#verifyotp").click(function () {

            // $("#sendotp").hide();
            // $("#optform").hide();
            // $("#verifyotp").hide();
           
            
            var to = $("#email").val();
            var optform = $("#optform").val();
            var password = $("#passwordform").val();
  
  console.log("work");
  $.post("../Common/validateForgotOtp", {
    to: to,
    optform: optform,
    password: password,
    
  },
    function (data, status) {
      //check response
      if (status == "success") {
        alert("Verify OTP Process");

      }
      else {
        alert("some where is error")
      }
    }
  );
        });




  $(document).ready(function () {

$("#sendotp").click(function () {
  var to = $("#email").val();
  
  console.log("work");
  $.post("../Common/send", {
    to: to,
    
  },
    function (data, status) {
      //check response
      if (status == "success") {
        alert("OTP SEND SUCEESSFULLy");

      }
      else {
        alert("some where is error")
      }
    }
  );

});

});

        </script>

</body>
</html>