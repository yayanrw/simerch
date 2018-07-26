<?php 
include_once 'assets/Library.php';
$db = new Library();
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$cekLogin = $db->cekLogin($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<style>
		
/*
    Note: It is best to use a less version of this file ( see http://css2less.cc
    For the media queries use @screen-sm-min instead of 768px.
    For .omb_spanOr use @body-bg instead of white.
    */

    @media (min-width: 768px) {
    	.omb_row-sm-offset-3 div:first-child[class*="col-"] {
    		margin-left: 25%;
    	}
    }

    body{

    }

    .omb_login .omb_authTitle {
    	text-align: center;
    	line-height: 300%;
    }

    .omb_login .omb_socialButtons a {
    	color: white; // In yourUse @body-bg 
    	opacity:0.9;
    }
    .omb_login .omb_socialButtons a:hover {
    	color: white;
    	opacity:1;    	
    }

    .omb_login .omb_loginOr {
    	position: relative;
    	font-size: 1.5em;
    	color: #aaa;
    	margin-top: 1em;
    	margin-bottom: 1em;
    	padding-top: 0.5em;
    	padding-bottom: 0.5em;
    }
    .omb_login .omb_loginOr .omb_hrOr {
    	background-color: #cdcdcd;
    	height: 1px;
    	margin-top: 0px !important;
    	margin-bottom: 0px !important;
    }
    .omb_login .omb_loginOr .omb_spanOr {
    	display: block;
    	position: absolute;
    	left: 50%;
    	top: -0.6em;
    	margin-left: -1.5em;
    	background-color: white;
    	width: 3em;
    	text-align: center;
    }			

    .omb_login .omb_loginForm .input-group.i {
    	width: 2em;
    }
    .omb_login .omb_loginForm  .help-block {
    	color: red;
    }


    @media (min-width: 768px) {
    	.omb_login .omb_forgotPwd {
    		text-align: right;
    		margin-top:10px;
    	}		
    }
</style>
</head>
<body>
	<div class="container">


		<div class="omb_login">
		<center>
			<img class="img-responsive" style="height: 200px;margin-top: 100px" src="images/kmp-2nd.png">
		<center>
			<h3 class="omb_authTitle">Login</a></h3>
			<div class="row omb_row-sm-offset-3">
				<div class="col-xs-12 col-sm-6">	
					<form class="omb_loginForm" action="" autocomplete="off" method="POST">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" name="username" placeholder="Username atau Nomor Induk Mahasiswa">
						</div>
						<span class="help-block"></span>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input  type="password" class="form-control" name="password" placeholder="Password">
						</div>
                        <p style="color: #dd4b39">
                        <?php if(isset($_GET['msg'])) {
                            echo '*'.$_GET['msg'];
                        } ?>
                        </p>
						<br>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
					</form>
				</div>
			</div>
		</div>



	</div>
</body>
</html>

