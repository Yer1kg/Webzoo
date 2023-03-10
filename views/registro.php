
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
					<input name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>">
					<label for="nombre">Nombre</label>
				</div>
				
				<div class="form-floating">
					<input name="apellidos" type="text" class="form-control" id="apellidos" placeholder="apellidos" value="<?php if(isset($_POST['apellidos'])){echo $_POST['apellidos'];} ?>">
					<label for="apellidos">Apellidos</label>
				</div>
				<div class="form-floating">
					<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
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
				<input class="w-100 btn btn-lg btn-primary" type="submit" value="CREAR"></input>
			</form>
		</main>
	</div>
</div>