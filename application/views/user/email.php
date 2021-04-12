<!DOCTYPE html>
<html>

    <head>
        <title>Registration form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
        <style>
            main .card {

                background-color: #77333d00;
    color: #f5f5f5;
            }

            body {
                background: #fc4a1a;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #f7b733, #fc4a1a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

                color: white;
            }

            h3 {
                font-family: Times New Roman;
                font-weight: bold;
            }

            hr {
                border-bottom: solid white 1px;
            }

            .btn {
                background: #ff4b1f;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ff9068, #ff4b1f);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ff9068, #ff4b1f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }

            input {
                background-color: #3475 !important;
                color: white !important;
            }

            ::placeholder {
                color: white !important;
            }

            .error {
                color: red;
            }

        </style>

    </head>

    <?php
	include_once "application/views/landing/header.php";
?>

    <body>

        <main class="container my-5">
            <div class="row">
                <section class="col-md-6 my-5 offset-md-3">

                    <div class="card shadow p-5">
                        <form method="post" onsubmit="return ValidationEvent()"
                            action="/estcodeigniter/index.php/EmailController/send">



                            <h3 class="text-center text-uppercase mb-4">Registration&nbsp;
                                <?php echo @$error; ?>
                            </h3>
                            <hr>

                            <div class="form-group">
                                <label>FirstName</label>

                                <input type="text" id="name" onkeyup="namevalid()" name="firstname"
                                    placeholder="FirstName" class="form-control">
                                    <?php echo form_error('firstname'); ?> 
                            </div>

                            <label>LastName</label>
                            <div class="form-group mb-3">

                                <input type="text" id="lname" name="lastname" placeholder="LastName"
                                    class="form-control" />
                                    <?php echo form_error('lastname') ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="mail" name="to" placeholder="Enter Your Email here .."
                                    class="form-control">
                                <input type="hidden" name="subject" placeholder="Enter Subject"
                                    value="OTP Verification">
                                    <?php echo form_error('to'); ?> 
                            </div>
                            <div class="form-group">
                                <label>Contact No</label>
                                <!-- <input type="text" name="email" /> -->
                                <!-- <input type="text" name="firstname"  /> -->
                                <input type="text" id="contact" name="contact" placeholder="Contact No"
                                    class="form-control">
                                    <?php echo form_error('contact') ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <!-- <input type="text" name="email" /> -->
                                <!-- <input type="text" name="firstname"  /> -->
                                <input type="password" id="pass" name="pass" placeholder="Password"
                                    class="form-control">
                                    <?php echo form_error('pass'); ?> 
                            </div>
                            <div class="form-group">
                                <label>Re-enter Password</label>
                                <!-- <input type="text" name="email" /> -->
                                <!-- <input type="text" name="firstname"  /> -->
                                <input type="password" id="confirmpass" name="repass" placeholder="Confirm Password"
                                    class="form-control">
                                    <?php  echo form_error('repass') ?>
                            </div>
                            <input type="submit" value="Registration"
                                class="btn btn-block btn-secondary rounded-pill mt-3" />


                            <p class="mt-3 text-white">Already have an Account ? <a
                                    href="estcodeiginiter/index.php/EmailController/login" class="text-white"> Login
                                    Here</a></p>

                        </form>
                    </div>
                </section>
            </div>
        </main>


    </body>
    <?php
     include_once "application/views/landing/footer.php"; 
     ?>

</html>

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

</script>
