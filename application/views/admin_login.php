<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url() ?>assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?php echo base_url() ?>assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Login Administrator</h3>
			<form class="" action="<?php echo base_url('admin/auth') ?>" method="post">
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						<input id="username" name="username" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Password</b></label>
						<a href="#" id="show-signup" class="link float-right">Lupa Password ?</a>
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-action-d-flex mb-3">
						<!-- <a href="#" class="btn btn-primary btn-block">Sign In</a> -->
						<button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
			</form>
		</div>

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Reset Password</h3>
			<form class="" action="<?php echo base_url('admin/resetpassword') ?>" method="post">
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						<input  id="username" name="username" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="passwordsignin" class="placeholder"><b>Password</b></label>
						<div class="position-relative">
							<input  id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="confirmpassword" class="placeholder"><b>Ulangi Password</b></label>
						<div class="position-relative">
							<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
					<div class="row form-action">
						<div class="col-md-6">
							<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
						</div>
						<div class="col-md-6">
							<!-- <a href="#" class="btn btn-primary w-100 fw-bold">Reset Password</a> -->
							<button type="submit" class="btn btn-primary w-100 fw-bold">Reset Password</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/ready.js"></script>

	<script>
		$(document).ready(function(){
			<?php if($this->session->flashdata('sukses')){ ?>
				swal({
					title: "SUKSES",
					text: "<?php echo $this->session->flashdata('sukses') ?>",
					icon: "success",
					buttons: {
						confirm: {
							text: "OK",
							value: true,
							visible: true,
							className: "btn btn-success",
							closeModal: true
						}
					}
				});
			<?php } ?>
			<?php if($this->session->flashdata('gagal')){ ?>
				swal({
					title: "PERHATIAN",
					text: "<?php echo $this->session->flashdata('gagal') ?>",
					icon: "warning",
					buttons: {
						confirm: {
							text: "OK",
							value: true,
							visible: true,
							className: "btn btn-warning",
							closeModal: true
						}
					}
				});
			<?php } ?>
		});
	</script>
</body>
</html>
