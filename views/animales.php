<div class="album py-5 bg-light">
    <div class="container">
       <div class="row">
        <?php while ($row = mysqli_fetch_assoc($this->animales)) {  ?>

            
                <div class="col-md-4">

                    <div class="card mb-4 box-shadow">

                        <img class="card-img-top" src="assets/img/animals/<?=$row['imagen']?>.jpg" alt="<?=$row['nombre']?>">

                        <div class="card-body">

                            <p class="card-text"><?=$row['especie']?></p>

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="btn-group">
                                        <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'user'){ ?>
                                            <a href="index.php?controller=user_animales" class="btn btn-primary w-100">Donar</a>
                                        <?php }else {?>
                                            <a href="index.php?controller=auth&action=login" class="btn btn-primary w-100">Registrarse y Donar</a>
                                        <?php } ?>


                                </div>

                                <small class="text-muted"><?=$row['zoo']?></small>

                            </div>

                        </div>

                    </div>

                </div>



            <?php } ?>

            </div>
    </div>
</div>