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
        <style>
            .btn-info{
                background: #ff4b1f;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ff9068, #ff4b1f);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ff9068, #ff4b1f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }
        .image--cover {

            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 20px;

            object-fit: cover;
            object-position: center right;
        }

        .col-xs-12 {
            display: flex;
            flex-direction: column-reverse;
        }

        </style>

    </head>



    <body>
        <?php
	include_once "application/views/landing/header.php";
?>
        <div class="container" style="margin-top:50px">
            <div class="jumbotron">
                <div class="">
                    <div class="row">
                        
           <div class="col-md-6  order-3 col-xs-order-2">
                            <div id="box">
                                
                                <form action="updateprofile" method="post">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="firstname" class="form-control"
                                            value="<?php echo $user_data[0]->cust_name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Last name</label>
                                        <input type="text" name="lastname" class="form-control"
                                            value="<?php echo $user_data[0]->cust_lname; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Contact</label>
                                        <input type="text" name="contact" class="form-control"
                                            value="<?php echo $user_data[0]->cust_contact; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="">
                                            Address
                                        </label>
                                        <textarea class="form-control" type="text" name="address"
                                            value=""><?php echo $user_data[0]->cust_address; ?></textarea>

                                    </div>
                                    <div class="form-group">

                                        <input type="hidden" name="email" class="form-control"
                                            value="<?php echo $user_data[0]->cust_email; ?>">
                                    </div>


                                    <div class="button">

                                        <input type="submit" class="btn btn-success" name="edit">
                                    </div>

                                </form>

                            </div>
                            <div id="changepas">
                                <form action="changepass" method="post">
                                    <div class="form-group mt-3">
                                        <label for="">Old Password</label>
                                        <input name="pass" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input name="newpass" type="password" class="form-control">
                                        <input type="hidden" name="email" class="form-control" value="<?php echo 
                                            $user_data[0]->cust_email;
                                             ?>">
                                    </div>
                                    <input type="submit" class="btn btn-success" name="submit">
                                </form>

                            </div>
                        </div>
                        <div class="col-md-6 order col-xs-order">
                            <div class="float-left">
                                <table class="table">
                                    <thead>
                                        <div class=" row text-center justify-content-center">

                                            <?php 
                                            
                                            // echo base_url().$user_data['0']->cust_profile_img;

                                            echo "<img class='image--cover' src='".base_url().$user_data['0']->cust_profile_img."' width=150px; height=100px;>";
                                            ?>
                                            <!-- <img src="https://htmlstream.com/preview/unify-v2.6.2/assets/img-temp/400x450/img5.jpg"
                                                alt="" class="image--cover" /> -->
                                        </div>
                                        <div id="mydivs"  class="alert alert-success">   
                        <?php echo $this->session->flashdata('loginsuccess'); ?><br>
                        

                

        
    </div>
    <div id="mydivs1"  class="alert alert-success">   
                    
                        <?php echo $this->session->flashdata('updateprofile'); ?>
        
    </div>
    <div id="mydivs2"  class="alert alert-danger">   
                    
                    <?php echo $this->session->flashdata('oldpass'); ?>
    
</div>
<div id="mydivs3"  class="alert alert-success">   
                    
                    <?php echo $this->session->flashdata('pro'); ?>
    
</div>
    
   
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>
                                                <div class="">
                                                    <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                                                    <label>First Name</label>

                                                </div>
                                            </td>
                                            <td>
                                                <?php 
                             echo $user_data[0]->cust_name." ".$user_data[0]->cust_lname;
                                ?>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="">
                                                    <i class="fa fa-envelope-square"></i>&nbsp;
                                                    <label>Email</label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php 
                             
                            
                             echo $user_data[0]->cust_email;
                                ?>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;
                                                    <label>Contact </label>

                                                </div>
                                            </td>
                                            <td>
                                                <?php 
                                
                            
                            
                             echo $user_data[0]->cust_contact;
                                ?>
                                            </td>
                                        </tr>


                                        <tr>

                                            <td>

                                                <div class="">
                                                    <i class="fa fa-book"></i>
                                                    &nbsp;<label>Address</label>
                                                </div>


                                            </td>
                                            <td>
                                                <?php 
                                
                            // print_r(['user_data']);
                            
                             echo $user_data[0]->cust_address;
                                ?>


                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                                <div class="row text-center justify-content-center">
                                    <button class=" btn btn-info m-1" id="toggleMessage">Edit Profile</button>
                                    <button class=" btn btn-info m-1" id="changepass">Change Password</button>
                                    <?php 
                                    //  form_open_multipart('EmailController/upload');
                                     ?>
                                     <form action="upload" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="email" class="form-control" value="<?php echo 
                                            $user_data[0]->cust_email;
                                             ?>">

                                    <?php echo "<input class='btn btn-info' type='file' name='profile_pic' size='20' />"; ?>
                                    <br>
                                    <br>

                                    <?php echo "<input class='btn btn-info' type='submit' name='submit' value='upload' /> ";?>
                                    <?php 
                                    // echo "</form>"
                                    ?>

                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <!-- <h1 >Welcome to your dashboard...</h1> -->
        </div>


        <?php
	include_once "application/views/landing/footer.php";
?>
    </body>



</html>


<script>

setTimeout(function() {
            $('#mydivs').hide('fast');
        }, 2000);

        setTimeout(function() {
            $('#mydivs1').hide('fast');
        }, 3000);
        setTimeout(function() {
            $('#mydivs2').hide('fast');
        }, 3000);


        setTimeout(function() {
            $('#mydivs3').hide('fast');
        }, 3000);



$("#box").hide();

/* .on() used in case there is ajax loaded content. */
$("body").on("click", "#toggleMessage", function() {


    $("#box").toggle('show'); /*shows or hides #box*/

});


$("#changepas").hide();

/* .on() used in case there is ajax loaded content. */
$("body").on("click", "#changepass", function() {


    $("#changepas").toggle('show'); /*shows or hides #box*/

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
