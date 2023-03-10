<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center">
    <?php while($row = mysqli_fetch_assoc($this->especies)) {  ?>
                    
                       
        <div class="col-sm-4 themed-grid-col"><h2 class="display-5 fw-bold"><?= $row['especie'] ?></h2></div>
                                   
            
                            
                        <?php } ?>

    </div>
</div>