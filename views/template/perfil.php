
<div class="container">
	<div class="row text-center">
		<main class="form-signin w-100 m-auto">
			<form class="my-5" action="" method="post">
				<?php if ($this->validation_errors <> ''){ ?>
					<div class="alert alert-danger">
						<?= $this->validation_errors ?>
					</div>
				<?php } ?>
				<div class="form-floating">
					<input name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre" value="<?php echo $this->resultado['nombre']; ?>">
					<label for="nombre">Nombre</label>
				</div>
				
				<div class="form-floating">
					<input name="apellidos" type="text" class="form-control" id="apellidos" placeholder="apellidos" value="<?php echo $this->resultado['apellidos']; ?>">
					<label for="apellidos">Apellidos</label>
				</div>
				<div class="form-floating">
					<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="<?php echo $this->resultado['email']; ?>">
					<label for="email">Email</label>
				</div>
				<div class="form-floating">
					<input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
					<label for="password">Password</label>
				</div>
				<div class="form-floating">
					<input name="password2" type="password" class="form-control" id="password2" placeholder="Password" value="<?php if(isset($_POST['password2'])){echo $_POST['password2'];} ?>">
					<label for="password2">Password repetido</label>
				</div>
				<div>
					<input class="w-100 btn btn-lg btn-primary" type="submit" value="GUARDAR"></input>
					<a class="w-100 btn btn-lg btn-primary"  href="index.php?controller=user_card&action=crear_tarjeta">Crear Tarjeta de crédito</a>
				</div>
			</form>
		</main>
	</div>
</div>