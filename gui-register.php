<?php require __DIR__ . '/views/header.php'; ?>

<h1>Register</h1>
<div class="register-container">
	<form action="app/users/register.php" method="post">
		<div class="form-group">
			<label for="email">E-mail</label>
			<input class="form-control" type="email" name="email" id="email" required>
			<small class="form-text text-muted">Please, provide your e-mail.</small>
		</div><!-- /form-group -->

		<div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" type="text" name="username" id="username" maxlength="15" required>
			<small class="form-text text-muted">Please, provide your username (max 15 characters).</small>
		</div><!-- /form-group -->

		<div class="form-group">
			<label for="passphrase">Passphrase</label>
			<input class="form-control" type="password" name="passphrase" id="passphrase" minlength="6" required>
			<small class="form-text text-muted">Please, provide your passphrase (min 6 characters).</small>
		</div><!-- /form-group -->

		<button type="submit" class="btn btn-primary" name="register-submit">Register</button>
	</form>
</div>

<br>

<a href="/gui-login.php">
	<p>Already a member? Click here to get to our login page.</p>
</a>

<?php require __DIR__ . '/views/footer.php'; ?>