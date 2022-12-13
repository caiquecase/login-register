<?php
include 'code/connection.inc.php';

$msg = '';
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secure_pwd = md5($password);

	$sql = "SELECT * FROM registration WHERE email='$email'";
	$sql_qry = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($sql_qry);

	if ($count > 0) {
		$msg = "Email existente";
	} else {
		$insert_sql = "INSERT INTO registration (name,email,password) VALUES('$name','$email','$secure_pwd')";
		$insert_qury = mysqli_query($conn, $insert_sql);
		header('location:login.php');
		
	}
}

?>









<?php include 'header-login.php'; ?>
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-sm-center h-100">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
				<div class="text-center my-1">
				<img src="./image/boneco-register.jpg" alt="logo" width="150">
				</div>
				<div class="card shadow-lg">
					<?php if ($msg) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>

					<div class="card-body p-5">
						<h1 class="fs-4 card-title fw-bold mb-4 text-center" style="font-family: 'Roboto', cursive;">Cadastrar</h1>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<div class="mb-3">
								<label class="mb-2 text-muted" for="name">Nome</label>
								<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
								<div class="invalid-feedback">
									Nome requerido
								</div>
							</div>

							<div class="mb-3">
								<label class="mb-2 text-muted" for="email">Endereço de e-mail</label>
								<input id="email" type="email" class="form-control" name="email" value="" required>
								<div class="invalid-feedback">
									Email inválido
								</div>
							</div>

							<div class="mb-3">
								<label class="mb-2 text-muted" for="password">Senha</label>
								<input id="password" type="password" class="form-control" name="password" required>
								<div class="invalid-feedback">
									Senha requerida
								</div>
							</div>
						
							<p class="form-text text-muted mb-3" style="font-family: 'Roboto', sans-serif;">
								Ao se cadastrar você concorda com nossos termos e condições. </p>
							<div class="d-grid gap-2" style="font-family: 'Roboto', sans-serif;">
								<button type="submit" name="submit" class="btn btn-primary">
									Cadastrar
								</button>
							</div>
							
						</form>
					</div>
					<div class="card-footer py-3 border-0">
						<div class="text-center" style="font-family: 'Roboto', sans-serif;">
						já tem uma conta? <a href="login.php" class="text-primary">Logar agora</a>
						</div>
					</div>
				</div>
				<div class="text-center mt-5 text-muted">
					Copyright &copy; 2022 &mdash; Caiquecase
				</div>
			</div>
		</div>
	</div>
</section>
