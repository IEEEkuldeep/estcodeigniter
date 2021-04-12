<!DOCTYPE html>
<html lang="en">

    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Document</title>
        <style>
        a {
            text-decoration: none;
            color: white !important;
        }

        </style>

    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background: #f12711;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right,  #f12711,#f5af19,);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #f12711, #f5af19); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
            <a class="navbar-brand" href="/estcodeigniter/">Welcome Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Disabled</a>
                    </li> -->
                </ul>
                <?php 
                    if (!$this->session->e)
{
    
 ?>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="nav-link" href="/estcodeigniter/index.php/EmailController/login">Login<span
                            class="sr-only">(current)</span></a>
                    <a class="nav-link" href="/estcodeigniter/index.php/EmailController/signup">Signup<span
                            class="sr-only">(current)</span></a>
                    <?php } ?>


                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>

                    <?php
                     
                    if (!$this->session->e)
                        {
                            
                        }
                        else
                        {

                        ?>
                    <!-- <a class="nav-link" href="/estcodeigniter/store/index.php/EmailController/dashboard">dashboard<span
                            class="sr-only">(current)</span></a> -->
                    <a class="nav-link" href="/estcodeigniter/index.php/EmailController/logout">logout<span
                            class="sr-only">(current)</span></a>
                    <?php echo $this->session->e; } ?>
                </form>
            </div>
        </nav>

        <!-- <div class="container">
            <div class="jumbotron">
                <h1>Navbar example</h1>
                <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you
                    scroll, it
                    will remain fixed to the top of your browser's viewport.</p>
                <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs
                    &raquo;</a>
            </div>
        </div> -->
    </body>

</html>
<script>
/*!
 * IE10 viewport hack for Surface/desktop Windows 8 bug
 * Copyright 2014-2017 The Bootstrap Authors
 * Copyright 2014-2017 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

// See the Getting Started docs for more information:
// https://getbootstrap.com/getting-started/#support-ie10-width

(function() {
    'use strict'

    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
            document.createTextNode(
                '@-ms-viewport{width:auto!important}'
            )
        )
        document.head.appendChild(msViewportStyle)
    }

}())
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
