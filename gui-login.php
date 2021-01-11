<?php require __DIR__ . '/views/header.php'; ?>

<article>
	<h1>Login</h1>

	<form action="app/users/login.php" method="post">
		<div class="form-group">
			<label for="email">E-mail</label>
			<input class="form-control" type="email" name="email" id="email" required>
			<small class="form-text text-muted">Please provide your email address.</small>
		</div><!-- /form-group -->

		<div class="form-group">
			<label for="passphrase">Passphrase</label>
			<input class="form-control" type="password" name="passphrase" id="passphrase" required>
			<small class="form-text text-muted">Please provide your passphrase.</small>
		</div><!-- /form-group -->

		<a href="#">
			<p>Lost your passphrase? Click here.</p>
		</a>

		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</article>

<br>

<a href="/gui-register.php">
	<p>New to this place? Click here to register.</p>
</a>

<?php require __DIR__ . '/views/footer.php'; ?>