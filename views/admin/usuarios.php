<div class="container">
	<div class="row">
        <div class="col">
            <a href="index.php?controller=admin_usuarios&action=crear_usuario" class="btn btn-warning">NUEVO</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <!-- <th scope="col">Id</th> -->
                    <th scope="col">Nombre</th>
                    <!--  <th scope="col">Apellidos</th>  -->
                    <!--  <th scope="col">Rol</th>  -->
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Creación</th>  -->
                </tr>
            </thead>
            <tbody>
                
                <?php while($row = mysqli_fetch_assoc($this->usuarios)) {  ?>
                    <tr>
                        <!-- <td><?= $row['id'] ?></td>   -->
                        <td><?= $row['nombre'] ?> 
                            <span class="float-end">
                                
                                <a title="EDITAR" href="index.php?controller=admin_usuarios&action=editar_usuario&id=<?= $row['id'] ?>" class=""><i class="fa-solid fa-edit"></i></a>
                                <a title="BORRAR" href="index.php?controller=admin_usuarios&action=borrar_usuario&id=<?= $row['id'] ?>" class=""><i class="fa-solid fa-trash"></i></a>                          
                        
                            </span>
                        </td>
                        <!-- <td><?= $row['apellidos'] ?></td>   -->
                        <!-- <td><?= $row['rol'] ?></td>   -->
                        <td><?= $row['email'] ?></td>
                        <!-- <td><?= $row['created_at'] ?></td>   -->
                    </tr>
                <?php } ?>
                
          </tbody>
        </table>
    </div>
</div>