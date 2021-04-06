<!DOCTYPE html>
<html>

    <head>
        <title>Student Dashboard</title>
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

    </head>



    <body>
        <?php
	include_once "application/views/landing/header.php";
?>
        <div class="container" style="margin-top:50px">
            <div class="jumbotron">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            ajsghr
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                <h1> User profile</h1>
                                <div class="">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                                    <label>First Name</label>

                                </div>
                                <div class="">
                                    <i class="fa fa-envelope-square"></i>&nbsp;
                                    <label>Email</label>

                                </div>
                                <div class="">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;
                                    <label>contact </label>


                                </div>

                                <div class="">
                                    <i class="fa fa-book"></i>
                                    &nbsp;<label>Address</label>

                                </div>
                                <?php echo $values->name; ?>

                            </div>

                        </div>

                    </div>
                </div>


            </div>

            <h1>Welcome to your dashboard...</h1>
        </div>


        <?php
	include_once "application/views/landing/footer.php";
?>
    </body>



</html>
