<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/h4ind/assests/css/main.css">
  <style>
    table {
      border: 1px solid #ccc;
      border-collapse: collapse;
      margin: 0;
      padding: 0;
      width: 100%;
      table-layout: fixed;
    }

    table caption {
      font-size: 1.5em;
      margin: .5em 0 .75em;
    }

    table tr {
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      padding: .35em;
    }

    table th,
    table td {
      padding: .625em;
      text-align: center;
    }

    table th {
      font-size: .85em;
      letter-spacing: .1em;
      text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
      table {
        border: 0;
      }

      table caption {
        font-size: 1.3em;
      }

      table thead {
        border: none;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
      }

      table tr {
        border-bottom: 3px solid #ddd;
        display: block;
        margin-bottom: .625em;
      }

      table td {
        border-bottom: 1px solid #ddd;
        display: block;
        font-size: .8em;
        text-align: right;
      }

      table td::before {
        /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
        content: attr(data-label);
        float: left;
        font-weight: bold;
        text-transform: uppercase;
      }

      table td:last-child {
        border-bottom: 0;
      }
    }
  </style>
</head>

<body>
  <aside class="side-nav" id="show-side-navigation1">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
    <div class="heading">
      <?php 
                                            
        // echo base_url().$user_data[0]->doctorprofilepic;
        //".base_url().$user_data['0']->cust_profile_img.";
        echo "<img class='img-cover' src='".base_url().$user_data['0']->doctorprofilepic."' style='max-width:50%; margin-top:20px';>";
        ?>
      <!-- <img src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt=""> -->
      <div class="info">
        <h6><a href="#">
            <?php echo $user_data[0]->doctoremail; ?>
          </a>
         
        </h6>
        <p>Doctor licence No.
        <a href="#">
            <?php echo $user_data[0]->doctorlicence; ?>
          </a>
        </p>
      </div>
    </div>
    <!-- <div class="search">
      <input type="text" placeholder="Search Patients here"><i class="fa fa-search"></i>
    </div> -->
    <ul class="categories">
      <li id="profile"><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#">Profile</a>

      </li>
      <li id="appoint"><i class="fa fa-support fa-fw"></i><a href="#">Appointments</a>

      </li>
      <!-- <li><i class="fa fa-envelope fa-fw"></i><a href="#">Patients Contact</a>

      </li>
      <li><i class="fa fa-users fa-fw"></i><a href="#"> Our Patients</a>
        <ul class="side-nav-dropdown">
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">ipsum dolor</a></li>
          <li><a href="#">dolor ipsum</a></li>
          <li><a href="#">amet consectetur</a></li>
          <li><a href="#">ipsum dolor sit</a></li>
        </ul>
      </li>
      <li><i class="fa fa-bolt fa-fw"></i><a href="#">
          High-priority Patients
        </a>
        <ul class="side-nav-dropdown">
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">ipsum dolor</a></li>
          <li><a href="#">dolor ipsum</a></li>
          <li><a href="#">amet consectetur</a></li>
          <li><a href="#">ipsum dolor sit</a></li>
        </ul>
      </li>
      <p>Example:</p>
      <li><i class="fa fa-envelope-open-o fa-fw"></i><a href="#"> Messages <span class="num dang">56</span></a>
        <ul class="side-nav-dropdown">
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">ipsum dolor</a></li>
          <li><a href="#">dolor ipsum</a></li>
          <li><a href="#">amet consectetur</a></li>
          <li><a href="#">ipsum dolor sit</a></li>
        </ul>

      </li>
      <li><i class="fa fa-wrench fa-fw"></i><a href="#"> Settings <span class="num prim">6</span></a>
        <ul class="side-nav-dropdown">
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">ipsum dolor</a></li>
          <li><a href="#">dolor ipsum</a></li>
          <li><a href="#">amet consectetur</a></li>
          <li><a href="#">ipsum dolor sit</a></li>
        </ul>
      </li> -->

    </ul>
  </aside>
  <section id="contents">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <i class="fa fa-align-right"></i>
          </button>
          <a class="navbar-brand" href="#">Doctor&nbsp;<span class="main-color">Dashboard</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">My profile <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="#"><i class="fa fa-user-o fw"></i> My account</a></li>
                <li><a href="#"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>
                <li><a href="#"><i class="fa fa-question-circle-o fw"></i> Help</a></li> -->
                <li role="separator" class="divider"></li>
                <li><a href="logout" id="logout"><i class="fa fa-sign-out"></i> Log out</a></li>
              </ul>
            </li>
            <!-- <li><a href="#"><i class="fa fa-comments"></i><span>23</span></a></li>
            <li><a href="#"><i class="fa fa-bell-o"></i><span>98</span></a></li> -->
            <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="welcome">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table id="appointtable">
              <caption>Appointmnet Details</caption>
              <thead>
                <tr>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">Patient Email</th>
                  <th scope="col">Appointment Status</th>
                  <th scope="col">Date and Time</th>
                  <th scope="col">Decline Appointment</th>
                  <th scope="col">Approve Appointment</th>
                  <!-- <th scope="col">Period</th> -->
                </tr>
              </thead>
              <tbody id="appointment">

              </tbody>
            </table>
            <div class="content" id="profile1">
              <h2>Welcome to Doctor Profile</h2>


              <div class="col-xl-12 col-md-12" id="profile1">
                <div class="container">
                  <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="account-settings">

                            <div class="text-left">
                              <div class="about">
                                <h3 class="mb-2 text-primary">Email</h3>
                                <p>
                                  <?php echo $user_data[0]->doctoremail; ?>
                                </p>
                              </div>
                              <div class="about">
                                <h3 class="mb-2 text-primary">Name</h3>
                                <p>
                                  <?php echo $user_data[0]->doctorname; ?>
                                </p>
                              </div>
                              <div class="about">
                                <h3 class="mb-2 text-primary">Gender</h3>
                                <p>
                                  <?php echo $user_data[0]->gender; ?>
                                </p>
                              </div>
                              <div class="about">
                                <h3 class="mb-2 text-primary">Speclist</h3>
                                <p>
                                  <?php echo $user_data[0]->speclist; ?>
                                </p>
                              </div>

                              <div class="about">
                                <h3 class="mb-2 text-primary">Address</h3>
                                <p>
                                  <?php echo $user_data[0]->street; ?>
                                </p>
                                <?php echo $user_data[0]->city; ?>
                                <?php echo $user_data[0]->district; ?>
                                <p>
                                  <?php echo $user_data[0]->state; ?>
                                </p>
                                <p>
                                  <?php echo $user_data[0]->pincode; ?>
                                </p>
                                <br>
                              </div>
                              <div class="about">
                                <h3 class="text-primary">Availability Morning</h3>
                                <p>IN &nbsp;&nbsp;TIME&nbsp; :
                                  <?php echo $user_data[0]->starttime; ?>
                                </p>
                                <p>OUT TIME:
                                  <?php echo $user_data[0]->endtime; ?>
                                </p>
                               
                                <small>
                                  <?php echo $user_data[0]->days; ?>
                                </small>

                               
                              </div>
                              <br>
                              <div class="text-left">

                                <form id="first_form" method="post" enctype="multipart/form-data">

                                  <input type="hidden" name="email" class="form-control" value="<?php echo 
            $user_data[0]->doctoremail;
             ?>">

                                  <?php echo "<input class='btn btn-sm btn-default' type='file' name='profile_pic' size='20' />"; ?>

                                  <br>
                                  <button class='btn btn-default' type='submit' name='submit' id="filesubmit"><i
                                      class="fa fa-upload"></i></button>

                                </form>
                              </div>
                              <div class="about">
                                <h3 class="text-primary">Updated  Interval</h3>
                                <p>Consultation &nbsp;&nbsp;TIME&nbsp; :
                                  <?php echo $user_data[0]->interval; ?>
                                </p>
                               
                               
                             

                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                      <div class="card h-100">
                        <div class="card-body">
                          <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <h3 class="mb-3 text-primary"> Doctor-Personal Details
                              </h3>
                            </div>
                            <!-- <?php echo $user_data[0]->doctoremail; ?> -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullname"
                                  value="<?php echo $user_data[0]->doctorname; ?>" placeholder="Enter full name">
                                <input type="hidden" class="form-control" id="email"
                                  value="<?php echo $user_data[0]->doctoremail; ?>">
                              </div>
                            </div>

                            <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="phone">Phone</label>
                                                                    <input type="text" class="form-control" id="phone"
                                                                        placeholder="Enter phone number">
                                                                </div>
                                                            </div> -->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                <label for="website">Specialization</label>
                                <input type="text" class="form-control" id="speclist" placeholder="Specialization"
                                  value="<?php echo $user_data[0]->speclist; ?>">
                              </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                              <div class="form-group">
                                <label for="website">Experience</label>
                                <input type="number" class="form-control" id="experience" placeholder="experience"
                                  value="<?php echo $user_data[0]->doctorexperience; ?>">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="mb-3 text-primary">Address</h3>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="Street">Street</label>
                              <input type="name" class="form-control" id="street" placeholder="Enter Street" value="<?php echo 
                                                                        $user_data[0]->street;
                                                                         ?>">
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="ciTy">City</label>
                              <input type="name" class="form-control" id="city" placeholder="Enter City" value="<?php echo 
                                                                        $user_data[0]->city;
                                                                         ?>">
                            </div>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="dist">District</label>
                              <input type="text" class="form-control" id="district" placeholder="Enter District" value="<?php echo 
                                                                      $user_data[0]->district;
                                                                       ?>">
                            </div>

                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="sTate">State</label>
                              <input type="text" class="form-control" id="state" placeholder="Enter State" value="<?php echo 
                                                                    $user_data[0]->state;
                                                                     ?>">
                            </div>
                          </div>
                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="zIp">Zip Code</label>
                              <input type="text" class="form-control" id="zip" placeholder="Zip Code" value="<?php echo 
                                                                        $user_data[0]->pincode;
                                                                         ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <label for="sel1">Start Time:HH:MM 24</label>
                          <select class="form-control" id="starttime">
                            <option>10:00</option>
                            <option>11:00</option>
                            <option>12:00</option>
                            <option>13:00</option>
                            <option>14:00</option>
                            <option>15:00</option>
                            <option>16:00</option>
                            <option>17:00</option>
                            <option>18:00</option>
                            <option>19:00</option>
                            <option>20:00</option>
                            <option>21:00</option>
                          </select>
                          <br>
                          <label for="sel1">END Time:HH:MM 24</label>
                          <select class="form-control" id="endtime">
                            <option>10:00</option>
                            <option>11:00</option>
                            <option>12:00</option>
                            <option selected>13:00</option>
                            <option>14:00</option>
                            <option>15:00</option>
                            <option>16:00</option>
                            <option>17:00</option>
                            <option>18:00</option>
                            <option>19:00</option>
                            <option>20:00</option>
                            <option>21:00</option>
                          </select>
                          <br>
                          <label for="sel1">Consultation Interval Minute </label>
                          <select class="form-control" id="interval">
                          <option >10 minutes</option>
                            <option selected>15 minutes</option>
                            <option>20 minutes</option>
                            <option>30 minutes</option>
                            
                            
                          </select>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                          <div class="form-group">
                            <label for="male">Male</label>
                            <input name="gender" id="gender" value="Male" type="radio">

                            <label for="femail">Female</label>
                            <input name="gender" id="gender" value="Female" type="radio">
                            <br>
                            <br>

                            <label for="Available"> Available Weekly Days:</label>
                            <br>
                            <br>
                            <label for="Monday">Monday</label>&nbsp;
                            <input type="checkbox" id="day" name="day[]" value="Monday">
                            <label for="Tuesday">Tuesday</label>&nbsp;
                            <input type="checkbox" id="day" name="day[]" value="Tuesday">
                            <label for="Wednesday">Wednesday</label>&nbsp;
                            <input type="checkbox" id="day" name="day[]" value="Wednesday">
                            <br>
                            <label for="Thusday">Thusday</label>&nbsp;
                            <input type="checkbox" id="day" name="day[]" value="Thusday">
                            <label for="Friday">&nbsp;Friday&nbsp;</label>&nbsp;
                            <input type="checkbox" id="day" name="day[]" value="Friday">
                            &nbsp;<label for="Saturday">&nbsp;Saturday&nbsp;</label>&nbsp;
                            <input type="checkbox" id="day" name="day[]" value="Saturday">


                          </div>


                          <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="text-right">
                                <button type="button" id="cancel" name="cancel"
                                  class="btn btn-secondary">Cancel</button>
                                <button type="button" id="update" name="update" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <section class="statistics">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="box">
                <i class="fa fa-envelope fa-fw bg-primary"></i>
                <div class="info">
                  <h3>1,245</h3> <span>Emails</span>
                  <p>Lorem ipsum dolor sit amet</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box">
                <i class="fa fa-file fa-fw danger"></i>
                <div class="info">
                  <h3>34</h3> <span>Projects</span>
                  <p>Lorem ipsum dolor sit amet</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box">
                <i class="fa fa-users fa-fw success"></i>
                <div class="info">
                  <h3>5,245</h3> <span>Users</span>
                  <p>Lorem ipsum dolor sit amet</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
    <section class="charts">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="chart-container">

              <canvas id="myChart"></canvas>
            </div>
          </div>
          <div class="col-md-6">
            <div class="chart-container">

              <canvas id="myChart2"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="admins">
      <div class="container-fluid">
        <div class="row">

        </div>
    </section>
    <!-- <section class='statis text-center'>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="box bg-primary">
                  <i class="fa fa-eye"></i>
                  <h3>5,154</h3>
                  <p class="lead">Page views</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box danger">
                  <i class="fa fa-user-o"></i>
                  <h3>245</h3>
                  <p class="lead">User registered</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box warning">
                  <i class="fa fa-shopping-cart"></i>
                  <h3>5,154</h3>
                  <p class="lead">Product sales</p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="box success">
                  <i class="fa fa-handshake-o"></i>
                  <h3>5,154</h3>
                  <p class="lead">Transactions</p>
                </div>
              </div>
            </div>
          </div>
        </section> -->
    <div class="chart-container">
      <canvas id="chart3" width="100%"></canvas>
    </div>
  </section>
  <script src='http://code.jquery.com/jquery-latest.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
  <script src='/h4ind/assests/script/doctor-d.js'></script>
</body>

</html>
<script>
  $(document).ready(function () {
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Doctor/getAppointmentDetails'); ?>",
      async: true,
      success: function (data) {
        $("#appointment").html(data);
        //             setTimeout(function(){
        //    window.location.reload(1);
        // }, 10000);
      }
    });

  });

  $("#myChart2").hide();

  $("#myChart").hide();
  $(".chatrs").hide();
  $(".admins").hide();
  $("#chart3").hide();
  $("#profile1").hide();

  $("#appoint").click(function () {
    $("#appointment").show();
    $("#appointtable").show();
    $("#profile1").hide();
  });

  $("#profile").click(function () {
    $("#appointment").hide();
    $("#appointtable").hide();
    $("#profile1").show();
  });



  $(document).ready(function () {


    $("#update").click(function () {
      var to = $("#email").val();
      var fullname = $("#fullname").val();
      var gender = $("#gender").val();
      var specli = $("#speclist").val();
      var experi = $("#experience").val();
      var street = $("#street").val();
      var city = $("#city").val();
      var district = $("#district").val();
      var state = $("#state").val();
      var zip = $("#zip").val();
      var starttime = $("#starttime").val();
      var endtime = $("#endtime").val();
      var interval = $("#interval").val();
      



      // var days = { 'day[]' : []};
      var days = [];

      $(":checked").each(function () {
        days.push($(this).val());
      });

      var wee = days;

      console.log(days);
      $.post("../Doctor/updateProfile",
       {
        email: to,
        fullname: fullname,
        specli: specli,
        gender: gender,
        experi: experi,
        street: street,
        city: city,
        district: district,
        state: state,
        zip: zip,
        starttime: starttime,
        endtime: endtime,
        week: wee,
        interval:interval,

      },
        function (data, status) {
          //check response
          if (status == "success") {
            location.reload();
            alert("Profile Updated Successfully");

          }
          else {
            alert("Please Check Error Field");
          }
        }
      );

    });

  });



  $(document).ready(function () {

    var readURL = function (input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".file-upload").on('change', function () {
      readURL(this);
    });

    $(".upload-button").on('click', function () {
      $(".file-upload").click();
    });
  });

  $(document).ready(function () {
    $("#filesubmit").click(function (event) {
      event.preventDefault();
      var form_data = new FormData($('#first_form')[0]);

      jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>" + "Doctor/upload",
        data: form_data,
        processData: false,
        contentType: false,
        async: true,
        success: function (res) {
          location.reload();
          if (res) {
            console.log(res);
          }
        }
      });
    });
  });


  $(document).on("click", ".docstatus", function () {
            // $('.button1').prop('disabled', true);

            var $ele = $(this).parent().parent();
            $.ajax({
                url: "<?php echo base_url("Doctor/ApprovePatientRequest");?>",
                type: "POST",
                cache: false,
                async: true,
                data: {
                type: 2,
                approvereq: $(this).attr("data-approve"),
                // id1: $(this).attr("data-id1")

            },
                success: function (dataResult) {
                    location.reload();
                    // alert(id);
                    alert("Approved Patient Request");
                    // var dataResult = JSON.parse(dataResult);
                    // if(dataResult.statusCode==200){
                    // 	$ele.fadeOut().remove();
                    // }
                }
		});
      
});


$(document).on("click", ".reject", function () {
            // $('.button1').prop('disabled', true);

            var $ele = $(this).parent().parent();
            $.ajax({
                url: "<?php echo base_url("Doctor/RejectPatientRequest");?>",
                type: "POST",
                cache: false,
                async: false,
                data: {
                type: 2,
                approvereq: $(this).attr("data-reject"),
                // id1: $(this).attr("data-id1")

            },
                success: function (dataResult) {
                    location.reload();
                    // alert(id);
                    alert("Rejected Patient Request");
                    // var dataResult = JSON.parse(dataResult);
                    // if(dataResult.statusCode==200){
                    // 	$ele.fadeOut().remove();
                    // }
                }
		});
        
           
    
 
});



</script>
<script type="text/javascript">
  window.history.forward();
  function noBack() {
    window.history.forward();
  }
</script>