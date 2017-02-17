<?php
require("Conect.php");

try{
  session_start();
  $usr_login = $_SESSION["usr_login"];
  $conect = new Conect();
  $on = $conect->initConexion("agendas") == "OK";
  if($on){
    $data = $conect->consultar(["EVENTOS"], ["*"],"WHERE ID_LOGIN = '${usr_login}'");
    $dataJson = [];
    /* fetch associative array*/
    while ($row = $data->fetch_assoc()) {
        $evento["id"] = $row['ID_EVENTO'];
        $evento["title"] = $row['TITULO'];
        $evento["allDay"] = ($row['HORA_INICIO']=="" && $row['FEC_FIN']=="" && $row['HORA_FIN']=="");
        $evento["start"] = $row['FEC_INICIO']." ".$row['HORA_INICIO'];
        $evento["end"] = $row['FEC_FIN']." ".$row['HORA_FIN'];
        array_push($dataJson, $evento);
    }
    $on = $conect->cerrarConexion();
    if($data->num_rows > 0){
      echo '{"msg":"OK", "eventos": '.json_encode($dataJson).'}';
    }
    else{
      echo '{"msg":"No Events with user '.$usr_login.'"}';
    }
  }
}catch(Exception $ex){
  echo $ex;
}
 ?>
