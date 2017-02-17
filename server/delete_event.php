<?php
require("Conect.php");
$id_evento = $_REQUEST["id_evento"];
$condicion = "ID_EVENTO = $id_evento;";
try{
  $conect = new Conect();
  $on = $conect->initConexion("agendas") == "OK";
  if($on){
    $resultado = $conect->eliminarRegistro("EVENTOS", $condicion);
    $conect->cerrarConexion();
    if($resultado > 0){
      echo '{"msg": "OK"}';
    }
    else{
      echo '{"msg": "El evento No. '.$id_evento.' no pudo ser eliminado '.$condicion.'"}';
    }
  }
}catch(Exception $ex){
  echo $ex;
}
?>
