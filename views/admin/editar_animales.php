<div class="container">
	<div class="row text-center">
		<main class="form-signin w-100 m-auto">
			<form class="my-5" action="" method="post">
				<?php if ($this->validation_errors <> '') { ?>
					<div class="alert alert-danger">
						<?= $this->validation_errors ?>
					</div>
				<?php } ?>
				<div class="form-floating">
					<input name="nombre" type="text" class="form-control" id="nombre" placeholder="nombre" value="<?php echo $this->animales['nombre']; ?>">
					<label for="nombre">Nombre</label>
				</div>

				<div class="form-floating">
					<input name="especie" type="text" class="form-control" id="especie" placeholder="especie" value="<?php echo $this->animales['especie']; ?>">
					<label for="especie">Especie</label>
				</div>
				<div class="form-floating">
					<input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="descripcion" value="<?php echo $this->animales['descripcion']; ?>">
					<label for="descripcion">Descripcion</label>
				</div>
				<div class="form-floating">
					<select name="zoo" id="zoo" class="form-select" aria-label="Default select example">
						<option value="">Seleccionar Zoo</option>
						<?php while ($row = mysqli_fetch_assoc($this->zoo_data)) {  ?>
							<option <?php echo $this->animales['zoo'] == $row['id'] ? 'selected' : ''?> value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>

						<?php } ?>
					</select>
				</div>
				<div class="form-floating">
					<input name="imagen" type="text" class="form-control" id="imagen" placeholder="imagen" value="<?php echo $this->animales['imagen']; ?>">
					<label for="imagen">Imagen</label>
				</div>
				<input class="w-100 btn btn-lg btn-primary" type="submit" value="GUARDAR"></input>
			</form>
		</main>
	</div>
</div>