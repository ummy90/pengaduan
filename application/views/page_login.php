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
			<h3 class="text-center">Silakan Login</h3>
			<div class="login-form">
				<form class="" action="<?php echo base_url('welcome/auth') ?>" method="post">
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					<div class="form-action mb-3">
						<!-- <a href="#" class="btn btn-primary btn-rounded btn-login">Masuk</a> -->
						<button type="submit" name="button" class="btn btn-primary btn-rounded btn-login">Masuk</button>
					</div>
				</form>
				<div class="login-account">
					<span class="msg">Anda belum mempunyai Akun?</span>
					<a href="#" id="show-signup" class="link">Silakan Registrasi</a>
				</div>
			</div>
		</div>

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Registrasi Akun</h3>
			<div class="login-form">
				<form class="" action="<?php echo base_url('welcome/register') ?>" method="post">
					<div class="form-group form-floating-label">
						<input  id="fullname" name="fullname" type="text" class="form-control input-border-bottom" required>
						<label for="fullname" class="placeholder">Nama Lengkap</label>
					</div>
					<div class="form-group form-floating-label">
						<input  id="nik" name="nik" type="text" class="form-control input-border-bottom" required>
						<label for="nik" class="placeholder">NIK</label>
					</div>
					<div class="form-group form-floating-label">
						<input  id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="email" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input  id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					<div class="form-group form-floating-label">
						<input  id="telepon" name="telepon" type="text" class="form-control input-border-bottom" required>
						<label for="email" class="placeholder">Telepon</label>
					</div>
					<div class="form-action">
						<a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Batal</a>
						<button type="submit" name="button" class="btn btn-primary btn-rounded btn-login">Registrasi</button>
					</div>
				</form>
			</div>
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
