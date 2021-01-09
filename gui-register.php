<?php require __DIR__ . '/views/header.php'; ?>

<h1>Sign Up</h1>
<div class="signup-container">
	<form action="app/users/register.php" method="post">
		<div class="form-group">
			<label for="email">E-mail</label>
			<input class="form-control" type="email" name="email" id="email" required>
			<small class="form-text text-muted">Provide your e-mail address.</small>
		</div><!-- /form-group -->

		<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" type="text" name="username" id="username" maxlength="15" required>
			<small class="form-text text-muted">Provide your username (max 15 characters).</small>
		</div><!-- /form-group -->

		<div class="form-group">
			<label for="passphrase">Passphrase</label>
			<input class="form-control" type="password" name="passphrase" id="passphrase" minlength="6" required>
			<small class="form-text text-muted">Using a phrase of a few random words is secure and easy to remember (min 6 characters).</small>
		</div><!-- /form-group -->

		<button type="submit" class="btn btn-primary" name="register-submit">Sign Up</button>
	</form>
</div>
<a href="/gui-login.php">
	<br>
	<p>Already have an account? Click here to login instead.</p>
</a>
<?php require __DIR__ . '/views/footer.php'; ?>