<!DOCTYPE html>
<html>

    <head>
        <title>Login form</title>
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
            background: #fe8c00;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,
                    #f83600,
                    #fe8c00);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right,
                    #f83600,
                    #fe8c00);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
        .error{
            color:#ff190993;
            font-weight: 600;
        }

        </style>
    </head>

    <body>
        <!-- <form>
            <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
                <tr>
                    <td colspan="2"><?php echo @$error; ?></td>
                </tr>
                <tr>
                    <td>Enter Your Email </td>
                    <td><input type="text" name="email" /></td>
                </tr>

                <tr>
                    <td width="230">Enter Your Password </td>
                    <td width="329"><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="login" value="Login" />
                    </td>
                </tr>
            </table>

        </form> -->
        <?php
     include_once "application/views/landing/header.php"; 
     ?>
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
                                <input type="password" name="pass1" id="password" class="form-control"
                                    placeholder="Enter Password" aria-label="Enter Password"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye"
                                            aria-hidden="true"></i>
                                    </span>
                                </div>
                                
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
        <?php
     include_once "application/views/landing/footer.php"; 
     ?>
    </body>

</html>

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
</script>
