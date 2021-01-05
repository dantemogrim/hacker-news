<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<!-- Calculating if user is logged in or not.
<?php //session_start(); 
?>  -->

<!-- Sign in form. -->
<a class="navLink" href="/index.php">Home</a>
<link rel="stylesheet" href="/assets/styles/app.css">

<!-- <?php //if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']
		//!== true) : 
		?> -->

<form action="app/users/login.php" method="post">

	<section>
		<label for="email">E-mail:</label>
		<input type="email">
	</section>

	<br>

	<section>
		<label for="password">Passphrase:</label>
		<input type="password">
	</section>

	<br>

	<p><b>Forgot your password?</b></p>

	<button type="">Sign in</button>

</form>

<p>Are you new to our site?</p>
<p>Click <a class="acc-create-link" href="/acc-create.php"><b><u>here</u></b></a> to create an account.</p>