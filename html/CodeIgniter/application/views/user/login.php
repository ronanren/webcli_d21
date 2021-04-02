<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Please do Login here</h3>
					</div>
					<?php
					$success_msg = $this->session->flashdata('success_msg');
					$error_msg = $this->session->flashdata('error_msg');

					if ($success_msg) {
					?>
						<div class="alert alert-success">
							<?php echo $success_msg; ?>
						</div>
					<?php
					}
					if ($error_msg) {
					?>
						<div class="alert alert-danger">
							<?php echo $error_msg; ?>
						</div>
					<?php
					}
					?>

					<div class="panel-body">
						<form role="form" method="post" action="<?php echo base_url('index.php/user/login_user'); ?>">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Enter your username" name="user_name" type="username" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Enter your password" name="user_password" type="password" value="">
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">
							</fieldset>
						</form>
						<center><b>You are not registered ?</b> <br></b><a href="<?php echo base_url('index.php/user'); ?>">Register here</a></center>
						<!--for centered text-->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>