<?php
require("Conect.php");
session_start();
$evento["id_login"] = $_SESSION["usr_login"];
$evento["titulo"] = $_REQUEST["titulo"];
$evento["fec_inicio"] =  $_REQUEST["fec_ini"];
$evento["hora_inicio"] =  $_REQUEST["hora_ini"];
$evento["fec_fin"] =  $_REQUEST["fec_fin"];
$evento["hora_fin"] =  $_REQUEST["hora_fin"];

try{
  $conect = new Conect();
  $on = $conect->initConexion("agendas") == "OK";
  if($on){
    $resultado = $conect->insertData("EVENTOS", $evento);
    $id_evento = $conect->getConexion()->insert_id;
    $conect->cerrarConexion();
    if($resultado > 0){
      echo '{"msg": "OK", "id_evento": "'.$id_evento.'"}';
    }
    else{
      echo '{"msg": "'.$evento["titulo"].' ya existe"}';
    }
  }
}catch(Exception $ex){
  echo $ex;
}
 ?>
