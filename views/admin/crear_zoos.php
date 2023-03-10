
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
					<input name="ciudad" type="text" class="form-control" id="ciudad" placeholder="ciudad" value="<?php if(isset($_POST['ciudad'])){echo $_POST['ciudad'];} ?>">
					<label for="ciudad">Ciudad</label>
				</div>
				<input class="w-100 btn btn-lg btn-primary" type="submit" value="CREAR"></input>
			</form>
		</main>
	</div>
</div>