<!DOCTYPE html>
<html>

    <head>
        <title>Registration form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            background-color: #3475;
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
            background: #0f2027;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,
                    #2c5364,
                    #203a43,
                    #0f2027);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right,
                    #2c5364,
                    #203a43,
                    #0f2027);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        input {
            background-color: #3475 !important;
            color: white !important;
        }

        ::placeholder {
            color: white !important;
        }

        </style>

    </head>

    <body>



        <main class="container my-5">
            <div class="row">
                <section class="col-md-6 my-5 offset-md-3">

                    <div class="card shadow p-5">
                        <?php
                        //  echo $this->session->flashdata('sess')
                         ?>
                        <form method="post" action="/estcodeigniter/store/index.php/EmailController/validateotp">

                            <h3 class="text-center text-uppercase mb-4">Email Verification&nbsp;
                                <?php
                            //  echo @$error;
                              ?>
                            </h3>
                            <hr>


                            <label>OTP</label>
                            <div class="input-group mb-3">

                                <input type="text" name="otp" placeholder="Enter Your OTP HERE " class="form-control" />
                            </div>

                            <span>
                                <small style="color:red"><?php echo $this->session->flashdata('item'); ?></small>

                            </span>

                            <input type="submit" value="OTP Verify"
                                class="btn btn-block btn-secondary rounded-pill mt-3" />


                            <p class="mt-3 text-white">Already have an Account ? <a href="/store/index.php/Hello/login"
                                    class="text-white"> Login
                                    Here</a></p>

                        </form>
                    </div>
                </section>
            </div>
        </main>
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
