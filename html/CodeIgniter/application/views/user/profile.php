<?php
$user_id = $this->session->userdata('user_id');

if (!$user_id) {
	redirect('user/login_view');
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>User Profile Dashboard-CodeIgniter Login Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<table class="table table-bordered table-striped">
					<tr>
						<th colspan="2">
							<h4 class="text-center">Users Details</h3>
						</th>
					</tr>
					<?php foreach ($users as $key => $val) { ?>
						<tr>
							<td>User ID</td>
							<td><?php echo $this->session->userdata('user_id'); ?></td>
						</tr>
						<tr>
							<td>User Role</td>
							<td><?php echo $this->session->userdata('user_role'); ?></td>
						</tr>
						<tr>
							<td>User Name</td>
							<td><?php echo $this->session->userdata('user_name'); ?></td>
						</tr>
						<tr>
							<td>User Password md5 hash</td>
							<td><?php echo $val['password']; ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<a href="<?php echo base_url('user/user_logout'); ?>"> <button type="button" class="btn-primary">Logout</button></a>
	</div>
</body>

</html>