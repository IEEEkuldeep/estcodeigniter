<!doctype html>
<html>
 <head>
   <title>404 Page Not Found</title>
   <style>
   /* body{
     width: 99%;
     height: 100%;
     background-color:#6dd5ed;
     color: white;
     font-family: sans-serif;
   } */
   div {
     position: absolute;
     width: 400px;
     height: 300px;
     z-index: 15;
     top: 45%;
     left: 50%;
     margin: -100px 0 0 -200px;
     text-align: center;
   }
   h1,h2{
     text-align: center;
   }
   h1{
     font-size: 60px;
     margin-bottom: 10px;
     border-bottom: 1px solid white;
     padding-bottom: 10px;
   }
   h2{
     margin-bottom: 40px;
   }
   a{
     margin-top:10px;
     text-decoration: none;
     padding: 10px 25px;
     background-color: ghostwhite;
     color: black;
     margin-top: 20px;
   }
   </style>

    <link rel="icon" href="/h4ind/assests/imagesimg/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="/h4ind/assests/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="/h4ind/assests/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="/h4ind/assests/css/style.css">
 </head>
 <body>
  <img src="https://woobro.design/thumbnails/30/page-not-found-404-error-vector-illustration-5de1881dd11bc.png" class="img-fluid" style="margin-top:-260px;">
   <div>
     <h1 style="color:white;">404</h1>
    
     <h2 style="color:white;">Page not found</h2>
     
     <a href='<?= base_url(); ?>' style="color:white;;">Back to Homepage</a>
   </div>
   <script src="/h4ind/assests/js/vendor-all.min.js"></script>
    <script src="/h4ind/assests/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/h4ind/assests/js/pcoded.min.js"></script>
 </body>
</html>