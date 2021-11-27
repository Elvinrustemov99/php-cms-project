<?php require view('static/header')?>

<div class="container">
	<div class="row justify-content-md-center mt-4">

		<div class="col-md-4">
			<form action="" method="post">
				<h3 class="mb-3">Qeydiyyat</h3>

				<?php  if ($err = error()): ?>
					<div class="alert alert-danger" role="alert">
						<?=$err?>
					</div>
				<?php endif; ?>

				<?php  if ($err = success()): ?>
					<div class="alert alert-success" role="alert">
						<?=$success?>
					</div>
				<?php endif; ?>

				<!-- <div class="alert alert-danger" role="alert">
					Hata mesajı örneği..
				</div>
				-->
				<div class="form-group">
					<label for="username">İstifadəçi Adı</label>
					<input type="text" class="form-control" value="<?= post('username') ?>" name="username" id="username" placeholder="İstifadəçi adınız..">
				</div>
				<div class="form-group">
					<label for="email">E-posta</label>
					<input type="text" class="form-control" value="<?= post('email')?>" name="email" id="email" placeholder="E-posta unvanı..">
				</div>
				<div class="form-group">
					<label for="password">Şifrə</label>
					<input type="password" class="form-control"  name="password" id="password" placeholder="*******">
				</div>
				<div class="form-group">
					<label for="password-again">Şifrənin (Təkrarı)</label>
					<input type="password" class="form-control"  name="password_again" id="password_again" placeholder="*******">
				</div>
				<input type="hidden" name="submit" value="1">
				<button type="submit" class="btn btn-primary">Qeydiyyat</button>
			</form>
		</div>

	</div>
</div>

<?php require view('static/footer')?>

