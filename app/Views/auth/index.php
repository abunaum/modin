<?= $this->extend('template/auth/index'); ?>
<?= $this->section('content'); ?>

<div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="https://avatars.githubusercontent.com/u/70275608" alt="logo"></a></div>
<h2 class="auth-heading text-center mb-5">Log in to Modin</h2>
<div class="auth-form-container text-start">
	<?php if (session()->getFlashdata('error')) : ?>
		<div class="text-center mb-3">
			<script type="text/javascript">
				var pesan = '<?= session()->getFlashdata('error') ?>';
				let timerInterval
				Swal.fire({
					icon: 'error',
					title: 'Ooops!',
					html: pesan,
					timer: 3000,
					timerProgressBar: true,
					didOpen: () => {
						Swal.showLoading()
						timerInterval = setInterval(() => 100)
					},
					willClose: () => {
						clearInterval(timerInterval)
					}
				}).then((result) => {
					if (result.dismiss === Swal.DismissReason.timer) {}
				})
			</script>
		</div>
	<?php endif; ?>
	<form class="auth-form login-form" action="auth/createurl" method="post">
		<div class="text-center">
			<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In with Google</button>
		</div>
	</form>

	<div class="auth-option text-center pt-5">Silahkan login menggunakan akun google anda</div>
</div>
<!--//auth-form-container-->

<?= $this->endSection(); ?>