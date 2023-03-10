
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
					<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
					<label for="email">Email address</label>
				</div>
				<div class="form-floating">
					<input name="password" type="password" class="form-control" id="password" placeholder="Password">
					<label for="password">Password</label>
				</div>
				<input class="w-100 btn btn-lg btn-primary" type="submit" value="ENVIAR"></input>
			</form>
		</main>
	</div>
</div>