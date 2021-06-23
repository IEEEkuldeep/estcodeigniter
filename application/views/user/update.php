<!DOCTYPE html>
<html>

    <head>
        <title>Update form</title>
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
        <?php
  $i=1;
   foreach($data as $row)
  {
  ?>
        <main class="container my-5">
            <div class="row">
                <section class="col-md-6 my-5 offset-md-3">

                    <div class="card shadow p-5">
                        <form method="post">

                            <h3 class="text-center text-uppercase mb-4">Update Form&nbsp;<?php echo @$error; ?></h3>
                            <hr>

                            <div class="form-group">
                                <label>FirstName</label>
                                <!-- <input type="text" name="email" /> -->
                                <input class="form-control" type="text" name="firstname"
                                    value="<?php echo $row->firstname; ?>" />
                                <!-- <input type="text" placeholder="Email" name="email" class="form-control"> -->
                            </div>

                            <label for="Password">LastName</label>
                            <div class="input-group mb-3">

                                <!-- <input type="password" name="password" /> -->
                                <input class="form-control" type="text" name="lastname"
                                    value="<?php echo $row->lastname; ?>" />

                            </div>
                            <label for="Password">Email</label>
                            <div class="input-group mb-3">

                                <input class="form-control" type="text" name="email"
                                    value="<?php echo $row->email; ?>" />

                            </div>

                            <input type="submit" name="update" class="btn btn-block btn-secondary rounded-pill mt-3"
                                value="Update Records" />

                            <!-- <button >Login</button> -->

                            <!-- <p class="mt-3 text-white">Don't have an Account ? <a href="/store/index.php/Hello/savedata"
                                    class="text-white"> Create
                                    Here</a></p> -->

                        </form>
                    </div>
                </section>
            </div>
        </main>





        <?php
    }
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
