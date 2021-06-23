<!DOCTYPE html>
<html>
<?php
	// include_once "application/views/landing/header.php";
?>

<head>
  <title>Registration form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="../assests/style.css">
  <link rel="stylesheet" href="../assests/signin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
  .nav-link.align-items-center.d-flex {
    margin-left: 12px;
  }
</style>

<body>

  <nav class="navbar sticky-top navbar-expand-md navbar-light d-flex>
            <div class=" container-fluid">

    <a href="/h4ind"><img class="w-25" src="../assests/images/H4INDIA-Logo.png" alt=""></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
      data-target="#navbarTransparentContent">
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

      </ul>
    </div>
    </div>

  </nav>



  <div class="container" id="container">

    <div class="form-container sign-up-container">

      <form method="post" action="/h4ind/Common/validateotp">
        <h1> Doctor's Sign Up</h1>

        <div>
          <input type="text" id="licence" name="lic" placeholder="Med-Licence-No" />
        </div>

        <div>
          <small id="licencevalid" class="text-danger
                text-muted invalid-feedback" style="color:red !important">
            Your licence must be a valid
          </small>

        </div>
        <div>
          <input type="email" id="email" name="to" placeholder="Email" />
          <small id="emailvalid" class="text-danger
                text-muted invalid-feedback" style="color:red !important">
            Your email must be a valid email
          </small>


          <input type="hidden" name="subject" id="subject" placeholder="Enter Subject" value="OTP Verification">


        </div>

        <div>
          <input id="pass" type="password" name="pass" id="password" placeholder="Password" />

        </div>
        <small id="passcheck" style="color: red !important;">
          Please Fill the password*
        </small>
        <?php echo form_error('pass'); ?>

        <div>
          <input id="repass" type="password" id="otpbtn" name="repass" placeholder="Confirm-Password" />

        </div>
        <small id="conpasscheck" style="color: red !important;">
          Password didn't match*
        </small>
        <?php echo form_error('repass'); ?>
        <div>
          <input id="otpform" name="otp" type="text" placeholder="OTP" />
        </div>
        <button type="submit" id="signup">Sign Up</button>


        <button class="signotp" type="button" id="sign">Send OTP</button>

    </div>
    </form>


    <div class="form-container sign-in-container">

      <form method="post" action="/h4ind/Doctor/login">

        <h1>Doctor's Sign In</h1>

        <span>or use your account</span>
        <?php  if($error=$this->session->flashdata('Login_failed')):  ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?= $error; ?>
          <a href="" class="closebtn" onclick="closeNav()">&times;</a>
          <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        </div>
        <?php endif; ?>
        <span>
          <small style="color:red">
            <?php echo $this->session->flashdata('item'); ?>
            <?php  echo form_error('otp') ?>
          </small>

        </span>
        <input type="email" name="email" id="demail" placeholder="Email" />
        <small id="emailvalid" class="text-danger
                text-muted invalid-feedback" style="color:red !important">
          Your email must be a valid email
        </small>
        <?php echo form_error('email'); ?>
        <div class="input-group">
          <!-- <input type="password" name="password" /> -->

          <input type="password" name="pass1" id="password" placeholder="Enter Password" aria-label="Enter Password"
            aria-describedby="basic-addon2">

          <?php echo form_error('pass1'); ?>
        </div>
        <div class="passicon float-end">
          <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" aria-hidden="true"></i>
          </span>
        </div>

        <a href="<?php echo base_url('./resetpwd') ?>">Forgot your password?</a>
        <!-- <button onclick="return false;">Sign In</button> -->
        <button type="submit">Sign In</button>
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

  $(function () {
    $("#sign").click(function () {
      $("#sign").hide();
      // $("#sign").show();
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

    $("#sign").click(function () {
      var to = $("#email").val();
      var pass = $("#pass").val();
      var repass = $("#repass").val();
      var subject = $("#subject").val();
      var licence = $("#licence").val();
      console.log("work");
      $.post("../Common/send", {
        to: to,
        pass: pass,
        repass: repass,
        subject: subject,
        licence: licence,
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




  $(document).ready(function () {


    $('#licencevalid').hide();
    // let passwordError = true;
    $('#licence').keyup(function () {
      const licence =
        document.getElementById('licence');
      licence.addEventListener('keyup', () => {
        let regex =
          /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        let s = licence.value;
        if (regex.test(s)) {
          $('#licencevalid').hide();

        }
        else {
          $('#licencevalid').show();
        }
      })

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

    // Validate Password
    $('#passcheck').hide();
    let passwordError = true;
    $('#pass').keyup(function () {
      validatePassword();
    });
    function validatePassword() {
      let passwrdValue =
        $('#pass').val();
      if (passwrdValue.length == '') {
        $('#passcheck').show();
        passwordError = false;
        return false;
      }
      if ((passwrdValue.length < 3) ||
        (passwrdValue.length > 10)) {
        $('#passcheck').show();
        $('#passcheck').html
          ("Password length must be between 3 and 10");
        $('#passcheck').css("color", "red");
        passwordError = false;
        return false;
      } else {
        $('#passcheck').hide();
      }
    }

    // Validate Confirm Password
    $('#conpasscheck').hide();
    let confirmPasswordError = true;
    $('#repass').keyup(function () {
      validateConfirmPasswrd();
    });
    function validateConfirmPasswrd() {
      let confirmPasswordValue =
        $('#repass').val();
      let passwrdValue =
        $('#pass').val();
      if (passwrdValue != confirmPasswordValue) {
        $('#conpasscheck').show();
        $('#conpasscheck').html(
          "Password didn't Match*");
        $('#conpasscheck').css(
          "color", "red");
        confirmPasswordError = false;
        return false;
      } else {
        $('#conpasscheck').hide();
      }
    }
  });


  $("#demail").keyup(function () {
    // Validate Email
    const email =
      document.getElementById('demail');
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