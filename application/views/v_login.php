<!-- Login Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="<?= base_url(); ?>assets/templates/proui/img/placeholders/photos/photo20.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
<!-- <img src="<?= base_url(); ?>assets/templates/proui/img/placeholders/backgrounds/login_full_bg.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow"> -->
<!-- END Login Full Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
	<div class="login-title text-center">
		<h1><i class="hi hi-fire"></i> <strong><?= $title_alt ?></strong><br><small><strong>Login</strong> Page</small></h1>
	</div>
	<div class="block push-bit">

		<div class="row" id="alert_msg">
			<div class="col-12">
				<?= $this->session->flashdata('message'); ?>
			</div>
		</div>
		<form action="#" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="gi gi-user"></i></span>
						<input type="text" class="form-control input-lg" id="username" name="username" placeholder="username" required>
					</div>
				</div>
				<div class="col-xs-12 notif_username  text-center">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">
						<span class="input-group-addon"><i class="gi gi-lock"></i></span>
						<input type="password" class="form-control input-lg" id="conf_password" name="conf_password" placeholder="password" required>
						<span class="input-group-addon"><i id="btn-show-password" class="fa fa-eye"></i></span>
					</div>
				</div>
				<div class="col-xs-12 notif_password text-center">
				</div>
			</div>
			<div class="form-group form-actions">
				<div class="col-xs-4">
				</div>
				<div class="col-xs-8 text-right">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
				</div>
			</div>
		</form>
	</div>
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				$("#alert_msg").html("");
				<?php $this->session->unset_userdata('message'); ?>
			}, 2000);

			$('#btn-show-password').on('click', function() {
				var x = document.getElementById("conf_password");
				if (x.type === "password") {
					x.type = "text";
					$("#btn-show-password").addClass("fa-eye-slash");
				} else {
					x.type = "password";
					$("#btn-show-password").removeClass("fa-eye-slash");
				}
			});

			$('#form-login').on('submit', function(e) {
				e.preventDefault();
				var username = $('#username').val();
				var password = $('#conf_password').val();
				$.ajax({
					url: "<?= base_url('auth') ?>/process_login",
					type: "POST",
					data: {
						username: username,
						password: password
					},
					dataType: "JSON",
					success: function(response) {
						// console.log(response);
						if (response.code != 200) {
							if (response.code === 403) {
								$('.notif_password').html(`<p class="text-danger"><small>${response.message}</small></p>`);
								setTimeout(function() {
									$('.notif_password').html(``);
								}, 2000);
							} else {
								// 404 & 402
								$('.notif_username').html(`<p class="text-danger"><small>${response.message}</small></p>`);
								setTimeout(function() {
									$('.notif_username').html(``);
								}, 2000);
							}
						} else {
							window.location.href = "<?= base_url('dashboard') ?>";
						}
					}
				});
			});


		});
	</script>
</div>
<!-- END Login Container -->