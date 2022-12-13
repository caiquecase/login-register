<?php
include 'code/connection.inc.php';
$msg = '';

if (isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secure_pwd = md5($password);

	$sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$secure_pwd'";

	$sql_qry = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($sql_qry);

	if ($count > 0) {
		$_SESSION['USER_LOGIN'] = $email;
		header('LOCATION:index.php');
	} else {
		$msg = '
		Por favor, insira os dados corretamente';
	}
}

?>

<?php include 'header-login.php'; ?>
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-sm-center h-100">
			<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
				 <div class="text-center my-3">
					<img src="./image/boneco-login.jpg" alt="logo" width="150">
				</div>
				<div class="card shadow-lg">
					<?php if ($msg) : ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $msg; ?>
						</div>
					<?php endif; ?>
					<div class="card-body p-5" >
						<h1 class="fs-4 card-title fw-bold mb-4 text-center" style="font-family: 'Roboto', sans-serif;">Login</h1>
						<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
							<div class="mb-3">
								<label class="mb-2 text-muted" for="email">Endereço de email</label>
								<input id="email" type="email" class="form-control" name="email" value="" required autofocus autocomplete="off">
								<div class="invalid-feedback">
									Email inválido
								</div>
							</div>

							<div class="mb-3">
								<div class="mb-2 w-100">
									<label class="text-muted" for="password">Senha</label>
								</div>
								<input id="password" type="password" name="password" class="form-control" required>
								<div class="invalid-feedback">
								Senha requerida
								</div>
							</div>

							<div class="d-grid gap-2" style="font-family: 'Roboto', sans-serif;">
								<button type="submit" name="submit" class="btn btn-primary">
									Entrar
								</button>
							</div>
						</form>
					</div>
					<div class="card-footer py-3 border-0">
						<div class="text-center" style="font-family: 'Roboto', sans-serif;">
							Não possui conta? <a href="register.php" style="color: #0d6efd;">Criar agora</a>
						</div>
					</div>
				</div>
				<div class="text-center mt-5 text-muted">
					Copyright &copy; <?= date('Y'); ?> &mdash; Caiquecase
				</div>
			</div>
		</div>
	</div>
</section>
