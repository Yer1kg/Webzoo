<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($this->tarjeta)) {  ?>


                <div class="col-md-4">

                    <div class="card mb-4 box-shadow">

                        <i class="fa-solid fa-credit-card fa-4x text-center"></i>

                        <div class="card-body">

                            <p class="card-text"><?= $row['numero'] ?></p>

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="btn-group">
                                    <a href="index.php?controller=user_card&action=editar_tarjeta&id=<?= $row['id'] ?>" class="btn btn-success w-100">Editar</a>
                                    <a href="index.php?controller=user_card&action=borrar_tarjeta&id=<?= $row['id'] ?>" class="btn btn-danger w-100">Borrar</a>
                                </div>



                            </div>

                        </div>

                    </div>

                </div>



            <?php } ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">

                    <i class="fa-solid fa-credit-card fa-4x text-center"></i>

                    <div class="card-body">


                        <div class="d-flex justify-content-between align-items-center">

                            <div class="btn-group">
                                <a href="index.php?controller=user_card&action=crear_tarjeta" class="btn btn-success w-100 text-center">Añadir</a>
                            </div>



                        </div>

                    </div>

                </div>

            </div>
        </div>
     </div>
 </div>    