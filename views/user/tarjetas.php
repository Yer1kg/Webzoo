<div class="container">
  <main>
  <form class="my-5" action="" method="post">
  <?php if ($this->validation_errors <> ''){ ?>
					<div class="alert alert-danger">
						<?= $this->validation_errors ?>
					</div>
				<?php } ?>
          <h4 class="mb-3">Tipo de pago</h4>

          <div class="my-3">
          <div class="form-floating">
					<select name="tipo" id="tipo" class="form-select" aria-label="Default select example">
						<option value="">Seleccionar tarjeta de crédito</option>		
							<option value="1" <?php if (isset($_POST['tipo']) && $_POST['tipo'] == "1") {echo 'selected';} ?>>Visa</option>
              <option value="2" <?php if (isset($_POST['tipo']) && $_POST['tipo'] == "2") {echo 'selected';} ?>>Mastercard</option>					
					</select>
				</div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
            <label for="numero">Numero</label>
            <input name="numero" type="text" class="form-control" id="numero" placeholder="numero" value="<?php if (isset($_POST['numero'])) {
																															echo $_POST['numero'];
																														} ?>">
            </div>

            <div class="col-md-6">
            <label for="fecha_exp">Fecha de expiración</label>
            <input name="fecha_exp" type="date" class="form-control" id="fecha_exp" value="<?php if (isset($_POST['fecha_exp'])) {
																															echo $_POST['fecha_exp'];
																														} ?>">
            </div>

            <div class="col-md-3">
            <label for="cvv">cvv</label>
            <input name="cvv" type="text" class="form-control" id="cvv" placeholder="cvv" value="<?php if (isset($_POST['cvv'])) {
																															echo $_POST['cvv'];
																														} ?>">
            </div>
            <i class="fa-solid fa-credit-card fa-4x float-end"></i>
          </div>
          

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Crear</button>
        </form>
      </div>
    </div>
    </form>
  </main>
</div>

