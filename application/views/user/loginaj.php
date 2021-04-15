<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>login Ajax Form</title>
		<!--Include Jquery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!--Include Bootstrap-->
		<link
			href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			rel="stylesheet"
			id="bootstrap-css"
		/>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <style>
            body{
                margin: 0;
                padding: 0;
            
                background-image: linear-gradient(#00cef9, #00e6af);
            height: 100vh;
            }
			#login .container #login-row #login-column #login-box{
				margin-top: 120px;
				max-width: 600px;
				height: 320px;
				border: 1px solid #9c9c9c;
				background-color: #EAEAEA;
			}
            #login .container #login-row #login-column #login-box #login-form{
				padding: 20px;			
			}
        </style>
	</head>
	<body>
		<div class="login-wrap">
			<div id="login">
				<h3 class="text-center">Login in codeigniter useing ajax</h3>
				<div
					id="login-row"
					class="row justify-content-center align-item-center"
				>
					<div id="login-column" class="col-md-6">
						<div id="login-box" class="col-md-12">
							<div id="login-form" class="form">
								<h3 class="text-center text-info">Login</h3>
								<div class="form-group">
									<label for="username" class="text-info">Username</label><br />
									<input
										type="text"
										name="username"
										id="username"
										class="form-control"
									/>
								</div>
								<div class="form-group">
									<label for="password" class="text-info">Password</label>
									<input
										type="text"
										name="password"
										id="password"
										class="form-control"
									/>
								</div>
								<div class="form-group">
									<input
										type="submit"
										name="submit"
										class="btn btn-info btn-md"
										value="submit"
										onclick="submitform()"
									/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
    // custom function to validate data and submit data through ajax
    function submitform(){
//flag to check the data if there is an error  , flag will turn tp 1
var flag = 0;
//  checking the value of inputs
 var username = $('#username').val();
 var password = $('#password').val();

console.log(username);
console.log(password);

//  validating the value of inputs that it is neither null or undefined
if(username =='' || username == undefined){
$('#username').css('border','1 px solid red');
flag = 1;
}
if(password =='' || password == undefined){
$('#password').css('border','1 px solid red');
flag = 1;
}
// if there is no error  go to flag ==0  condition
if(flag == 0){
    // ajax call
    $.ajax({
        url: "<?php base_url('index.php/EmailController/getlogin') ?>",
        method : "POST",
        data: "UserName="+username + "&Password" +password,
        success:function(result){
            //result is the response forn  EmailController .php file unser the getlogin php function
            if(result == 1){
                // if response result is 1 it means it is successful
                $('#username').css('border','1px solid green');
                $('#password').css('border','1px solid green');
                setTimeout(function(){
                    // redirect to login page after 1 sec
                    window.location.href = '<?php echo base_url("index.php/EmailController/dashboardaj") ?>';

                }),1000;
            }
            else if(result == 2 ){
                // if response result is 2 it means  username is invalid
                 $('#username').css('border','1px solid red');
                 alert('invalid username');

            }
            else if(result == 3){
                // if response is 3 it means password is  invalid
                $('#password').css('border','1px solid red');
                alert('invalid Password')
            }
            else if(result == 4 && result == 5){
                // if  response result is 4 or 5 it means username and password are invalid
                $('#username').css('border','1px solid red');
                $('#password').css('border','1px solid red');
                alert('Invalid Username and Password');
            }
            else{
                alert('something went wrong')

            }
        }
    });

} else{
    alert('Something went wrong');
}




    }

</script>