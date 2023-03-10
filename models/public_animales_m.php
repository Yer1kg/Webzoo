<?php
require_once('basic_m.php');
class Public_animales_m extends Basic_m{
   

    public function get_animals(){

    /*Genero la consulta*/
    $consulta = "SELECT *, zoos.nombre AS zoo FROM animales JOIN zoos ON animales.zoo = zoos.id";
    return $this->get_result($consulta);

    }
}
?>