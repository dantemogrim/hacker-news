<?php require __DIR__ . '/views/header.php'; ?>

<!-- Check if the user's already logged in - in which case take them to the main page instead.
// if (!isset($_SESSION['logged-in'])) : redirect('/login_form.php'); endif; -->

<article>
	<h1>Login</h1>

	<form action="app/users/login.php" method="post">
		<div class="form-group">
			<label for="email">E-mail or username</label>
			<input class="form-control" type="email" name="email" id="email" required>
			<small class="form-text text-muted">Please provide the your email address.</small>
		</div><!-- /form-group -->

		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" id="password" required>
			<small class="form-text text-muted">Please provide the your password (passphrase).</small>
		</div><!-- /form-group -->

		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>