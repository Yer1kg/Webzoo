<div class="container">
	<div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Especie</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while($row = mysqli_fetch_assoc($this->especies)) {  ?>
                    <tr>
                       
                        <td><?= $row['especie'] ?></td>
                           

                    </tr>
                <?php } ?>
                
          </tbody>
        </table>
    </div>
</div>