
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
					<input name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre" value="<?php echo $this->usuarios['nombre']; ?>">
					<label for="nombre">Nombre</label>
				</div>
				
				<div class="form-floating">
					<input name="apellidos" type="text" class="form-control" id="apellidos" placeholder="apellidos" value="<?php echo $this->usuarios['apellidos']; ?>">
					<label for="apellidos">Apellidos</label>
				</div>
				<div class="form-floating">
					<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="<?php echo $this->usuarios['email']; ?>">
					<label for="email">Email</label>
				</div>
				<input class="w-100 btn btn-lg btn-primary" type="submit" value="GUARDAR"></input>
			</form>
		</main>
	</div>
</div>