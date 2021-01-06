<?php require __DIR__ . '/views/header.php'; ?>

<article>
	<h1>Sign Up</h1>
	<section class="signup-form">
		<form action="app/users/register.php" method="post">
			<div class="form-group">
				<label for="email">Name</label>
				<input class="form-control" type="text" name="name" id="name" required>
				<small class="form-text text-muted">Please provide your full name.</small>
			</div><!-- /form-group -->

			<div class="form-group">
				<label for="email">Username</label>
				<input class="form-control" type="text" name="user-id" id="email" required>
				<small class="form-text text-muted">Please provide a username.</small>
			</div><!-- /form-group -->

			<div class="form-group">
				<label for="email">E-mail</label>
				<input class="form-control" type="email" name="email" id="email" required>
				<small class="form-text text-muted">Please provide your e-mail address.</small>
			</div><!-- /form-group -->

			<div class="form-group">
				<label for="password">Passphrase</label>
				<input class="form-control" type="password" name="password" id="password" required>
				<small class="form-text text-muted">Please provide your password (passphrase).</small>
			</div><!-- /form-group -->

			<button type="submit" class="btn btn-primary">Sign Up</button>
		</form>
</article>
</section>
<?php require __DIR__ . '/views/footer.php'; ?>