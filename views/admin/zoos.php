<div class="container">
	<div class="row">
        <div class="col">
            <a href="index.php?controller=admin_zoos&action=crear_zoo" class="btn btn-warning">NUEVO</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <!-- <th scope="col">Id</th> -->
                    <th scope="col">Nombre</th>
                    <!--  <th scope="col">Apellidos</th>  -->
                    <!--  <th scope="col">Rol</th>  -->
                    <th scope="col">Ciudad</th>
                    <!-- <th scope="col">Creación</th>  -->
                </tr>
            </thead>
            <tbody>
                
                <?php while($row = mysqli_fetch_assoc($this->zoos)) {  ?>
                    <tr>
                        <!-- <td><?= $row['id'] ?></td>   -->
                        <td><?= $row['nombre'] ?> 
                            <span class="float-end">
                                
                                <a title="EDITAR" href="index.php?controller=admin_zoos&action=editar_zoo&id=<?= $row['id'] ?>" class=""><i class="fa-solid fa-edit"></i></a>
                                <a title="BORRAR" href="index.php?controller=admin_zoos&action=borrar_zoo&id=<?= $row['id'] ?>" class=""><i class="fa-solid fa-trash"></i></a>                          
                        
                            </span>
                        </td>

                        <td><?= $row['ciudad'] ?></td>
                        
                    </tr>
                <?php } ?>
                
          </tbody>
        </table>
    </div>
</div>