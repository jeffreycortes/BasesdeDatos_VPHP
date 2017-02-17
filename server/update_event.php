<?php
require("Conect.php");
$id_evento = $_REQUEST["id_evento"];
$evento["fec_inicio"] =  $_REQUEST["fec_ini"];
$evento["hora_inicio"] =  $_REQUEST["hora_ini"];
$evento["fec_fin"] =  $_REQUEST["fec_fin"];
$evento["hora_fin"] =  $_REQUEST["hora_fin"];

try{
  $conect = new Conect();
  $on = $conect->initConexion("agendas") == "OK";
  if($on){
    $resultado = $conect->actualizarRegistro("EVENTOS", $evento, "ID_EVENTO = $id_evento");
    if($resultado > 0){
      echo '{"msg":"OK"}';
    }
    else{
      echo '{"msg":"Error: El evento no pudo ser actualizado!"}';
    }
    $conect->cerrarConexion();
  }
}catch(Exception $ex){
  echo $ex;
}
 ?>
