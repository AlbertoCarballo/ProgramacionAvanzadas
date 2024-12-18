<?php
include_once ("app/AuthController.php");

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style type="text/css">
		.logo {
			max-width: 200px;
		}

		.cover-login {
			background: url(login_cover.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
</head>

<body>

	<div class="container vh-100 align-items-center align-items-center">

		<div class="row mt-5 justify-content-md-center">

			<div class="col-xs-12 col-md-5 shadow-lg cover-login rounded d-none d-md-block">
			</div>

			<div class="col-xs-12 col-md-5 shadow-lg p-3 rounded">
				<!-- formulario de login -->

				<img class="logo img-thumbnail rounded mb-4" src="logo.avif">

				<h3>
					Accede al panel administrador
				</h3>

				<form  method="POST" action="app/Auth">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
							name="email" required>
						<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Check me out</label>
					</div>
					<input type="hidden" id="tokenInput" name="token" value="<?php echo $token; ?>">
					<button type="submit" class="btn btn-primary col-12">
						Submit
					</button>

					<input type="hidden" name="action" value="access">
				</form>

			</div>

		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
		<script>
		document.addEventListener("DOMContentLoaded", function() {
			const token = document.getElementById('tokenInput').value;
			console.log("Token generado en PHP:", token);
		});
	</script>
</body>

</html>